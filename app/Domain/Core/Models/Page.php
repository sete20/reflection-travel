<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;

    public $timestamps = false;

    protected $guarded = [];

    protected $translatable = ['title', 'body'];

    public const TERMS = 'TERMS_AND_CONDITIONS';

    public const ABOUT = 'ABOUT_US';

    public const PRIVACY = 'PRIVACY_AND_POLICIES';

    public const COMPANY_HISTORY = 'COMPANY_HISTORY';

    public const LEGAL = 'LEGAL';

    public const PARTNERS = 'PARTNERS';

    public const PAYMENT = 'PAYMENT';

    public const COOKIES = 'COOKIES';

    public const FEEDBACK = 'FEEDBACK';

    public const POLICIES = 'POLICIES';

    protected $primaryKey = 'key';

    protected $keyType = 'string';
}
