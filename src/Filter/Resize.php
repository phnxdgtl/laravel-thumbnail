<?php

namespace Rolandstarke\Thumbnail\Filter;


use Intervention\Image\Image;
use Rolandstarke\Thumbnail\Smartcrop;

class Resize implements FilterInterface
{
    public function handle(Image $image, array $params): Image
    {
        if (isset($params['smartcrop'])) {
            list($width, $height) = array_map('intval', explode('x', $params['smartcrop']));
            $smartcrop = new Smartcrop($image, [
                'width' => $width,
                'height' => $height,
            ]);
            $res = $smartcrop->analyse();
            $topCrop = $res['topCrop'];
            if ($topCrop) {
                $image->crop(min($topCrop['width'], $width), min($topCrop['height'], $height), $topCrop['x'], $topCrop['y']);
            } else {
                $image->crop($width, $height);
            }
        }

        if (isset($params['crop'])) {
            list($width, $height) = array_map('intval', explode('x', $params['crop']));
            $image->resize($width, $height);
        }

        if (isset($params['widen'])) {
            /** v2 approach:
            $image->widen((int)$params['widen'], function ($constraint) {
                $constraint->upsize();
            });
            **/
            $image->resizeDown(width: (int)$params['widen']);
        }

        if (isset($params['heighten'])) {
            /** v2 approach:
            $image->heighten((int)$params['heighten'], function ($constraint) {
                $constraint->upsize();
            });
            **/
            $image->resizeDown(height: (int)$params['heighten']);
        }

        return $image;
    }
}
