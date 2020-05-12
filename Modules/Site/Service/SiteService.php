<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/24
 * Time: 下午 06:19
 */

namespace Modules\Site\Service;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Modules\Base\Constants\ApiCode\OOOO1CommonCodes;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Site\Entities\Site;
use Modules\Site\Http\Requests\ManageSiteUpdateRequest;
use Modules\Site\Repositories\SiteRepo;

class SiteService
{
    /** @var SiteRepo $repo */
    private $repo;

    public function __construct()
    {
        $this->repo = new SiteRepo();
    }

    /**
     * @return Site|null
     */
    public function first()
    {
        return $this->repo->first();
    }

    /**
     * @param ManageSiteUpdateRequest $request
     * @param Cloud $cloud
     * @return Site|null
     * @throws ApiErrorCodeException
     */
    public function update(ManageSiteUpdateRequest $request, Cloud $cloud)
    {
        $site = $this->repo->first() ?? new Site();
        $site->fill([
            'title'     => $request->getTitle(),
            'copyright' => $request->getCopyright(),
            'icp'       => $request->getIcp(),
            'contact'   => $request->getContact()
        ]);
        $this->editUpload(
            $site,
            'logo_path',
            $cloud,
            $request->getLogo(),
            $request->getDelLogo()
        );
        $this->editUpload(
            $site,
            'ios_qr_path',
            $cloud,
            $request->getIOSQRCode(),
            $request->getDelIOSQRCode()
        );
        $this->editUpload(
            $site,
            'android_qr_path',
            $cloud,
            $request->getAndroidQRCode(),
            $request->getDelAndroidQRCode()
        );
        if (!$this->repo->save($site)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::UPDATE_FAIL);
        }

        return $site;
    }

    /**
     * @param Site|null $site
     * @param string $pathColumn
     * @param Cloud $cloud
     * @param UploadedFile|null $file
     * @param string|null $isDel
     * @throws ApiErrorCodeException
     */
    private function editUpload(
        Site $site,
        string $pathColumn,
        Cloud $cloud,
        UploadedFile $file = null,
        string $isDel = null
    ) {
        if (!is_null($isDel)) {
            $this->deleteImage($site, $pathColumn, $cloud);
            $site->setAttribute($pathColumn, null);
        }
        if (!is_null($file)) {
            $site->setAttribute($pathColumn, $this->updateUpload($pathColumn, $cloud, $site, $file));
        }
    }

    /**
     * @param string $pathColumn
     * @param Cloud $cloud
     * @param Site|null $site
     * @param UploadedFile|null $file
     * @return string
     * @throws ApiErrorCodeException
     */
    private function updateUpload(string $pathColumn, Cloud $cloud, Site $site = null, UploadedFile $file = null)
    {
        $this->deleteImage($site, $pathColumn, $cloud);
        $fullPath = $cloud->put(config('Site.config.image_path'), $file, Filesystem::VISIBILITY_PUBLIC);
        if (is_bool($fullPath)) {
            throw new ApiErrorCodeException(OOOO1CommonCodes::CREATE_FAIL, 'Upload image fail');
        }

        return $fullPath;
    }

    /**
     * @param Site $site
     * @param string $pathColumn
     * @param Cloud $cloud
     * @return bool
     */
    private function deleteImage(Site $site, string $pathColumn, Cloud $cloud)
    {
        return is_null($site) ? false : $cloud->delete($site->$pathColumn);
    }
}
