<?php

namespace App\Models\User;

use Illuminate\Notifications\Notifiable;
use App\Models\Access\User\Traits\UserAccess;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User\Traits\Scope\UserScope;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Access\User\Traits\UserSendPasswordReset;
use App\Models\Access\User\Traits\Attribute\UserAttribute;
use App\Models\User\Traits\Relationship\UserRelationship;

/**
 * Class User.
 */
class User extends Authenticatable
{
    // Travel type constants
    const TRAVEL_TYPE_ADVENTURE = 0;
    const TRAVEL_TYPE_PEACE     = 1;
    const TRAVEL_TYPE_SHOPPING  = 2;
    const TRAVEL_TYPE_SAFARI    = 3;
    const TRAVEL_TYPE_FAMILY    = 5;
    const TRAVEL_TYPE_RELAX     = 6;
    const TRAVEL_TYPE_BEACH     = 7;
    const TRAVEL_TYPE_NIGHTLIFE = 8;
    const TRAVEL_TYPE_SPA       = 9;
    const TRAVEL_TYPE_ACADEMIC  = 10;
    const TRAVEL_TYPE_HEALTH    = 11;
    const TRAVEL_TYPE_BUSINESS  = 12;
    const TRAVEL_TYPE_SPIRITUAL = 13;

    // Relationship Constants
    const RELATION_SINGLE    = 0;
    const RELATION_ENGAGED   = 1;
    const RELATION_MARRIED   = 2;
    const RELATION_WIDOWED   = 3;
    const RELATION_SEPERATED = 4;
    const RELATION_DIVORCED  = 5;

    // Gender Constants
    const GENDER_MALE   = 0;
    const GENDER_FEMALE = 1;
    const GENDER_UNSPECIFIED = 2;

    //Status Constants
    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;

    use UserScope,
        UserAccess,
        Notifiable,
        SoftDeletes,
        UserAttribute,
        UserRelationship,
        UserSendPasswordReset;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'status', 'confirmation_code', 'confirmed', 'address', 'single', 'gender', 'children', 'age', 'profile_picture', 'mobile', 'nationality', 'public_profile', 'notifications', 'messages', 'username'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.users_table');
    }

    public static function getCountries()
    {
        return  array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    }

    public static function getGender()
    {
        return [
            self::GENDER_MALE => "Male",
            self::GENDER_FEMALE => "Female"
        ];
    }

    public static function getRelationStatus()
    {
        return [
            self::RELATION_SINGLE    => "Single",
            self::RELATION_ENGAGED   => "Engaged",
            self::RELATION_MARRIED   => "Married",
            self::RELATION_WIDOWED   => "Widowed",
            self::RELATION_SEPERATED => "Separated",
            self::RELATION_DIVORCED  => "Divorced"
        ];   
    }

    public static function travelTypes()
    {
        return [
            self::TRAVEL_TYPE_ADVENTURE => "Adventure",
            self::TRAVEL_TYPE_PEACE     => "Peace",
            self::TRAVEL_TYPE_SHOPPING  => "Shopping",
            self::TRAVEL_TYPE_SAFARI    => "Safari",
            self::TRAVEL_TYPE_FAMILY    => "Family",
            self::TRAVEL_TYPE_RELAX     => "Relax",
            self::TRAVEL_TYPE_BEACH     => "Beach",
            self::TRAVEL_TYPE_NIGHTLIFE => "Night Life",
            self::TRAVEL_TYPE_SPA       => "SPA",
            self::TRAVEL_TYPE_ACADEMIC  => "Academic",
            self::TRAVEL_TYPE_HEALTH    => "Health",
            self::TRAVEL_TYPE_BUSINESS  => "Business",
            self::TRAVEL_TYPE_SPIRITUAL => "Spiritual"
        ];
    }
}
