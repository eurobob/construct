<?php namespace Livit\Build;

use Zizaco\Entrust\Traits\EntrustUserTrait;

trait User
{
    use EntrustUserTrait;

    /**
     * Set the name attribute and automatically the slug
     *
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        if (! $this->exists) {
            $slug = setUniqueSlug($this, $value, '');
            $this->attributes['slug'] = setUniqueSlug($this, $value, '');
        }
    }
}
