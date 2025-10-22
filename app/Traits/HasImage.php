<?php

namespace App\Traits;

trait HasImage
{
    public function getImageAttribute()
    {
        $field = $this->getImageField();
        $value = $this->{$field};
        $path = $this->getImagePath();

        return isset($value) ? env('AWS_BUCKET_URL') . $path . $value : asset('images/default.jpg');
    }

    protected function getImageField()
    {
        if (property_exists($this, 'imageField')) {
            return $this->imageField;
        }

        foreach (['logo', 'image', 'file'] as $field) {
            if (isset($this->{$field})) {
                return $field;
            }
        }
        return null;
    }

    protected function getImagePath()
    {
        if (property_exists($this, 'imagePath')) {
            return env($this->imagePath);
        }
        return '';
    }
}
