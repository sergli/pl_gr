<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Ccode
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Ccode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ccode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ccode query()
 */
	class Ccode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Foreigner[] $foreigners
 * @property-read int|null $foreigners_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\CompanyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Foreigner[] $foreigners
 * @property-read int|null $foreigners_count
 * @method static \Database\Factories\CountryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Foreigner
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $regdate
 * @property int|null $patentserie
 * @property int|null $patentnumber
 * @property int|null $polisnumber
 * @property string $poliscompany
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $company_id
 * @property int $country_id
 * @property int $position_id
 * @property string|null $regenddate
 * @property string|null $patentdate
 * @property string|null $patentenddate
 * @property string|null $patentnextpaydate
 * @property string|null $polisdate
 * @property string|null $polisenddate
 * @property string|null $dateoutwork
 * @property string|null $dateinwork
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\Country $country
 * @property-read \App\Models\Position $position
 * @method static \Database\Factories\ForeignerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereDateinwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereDateoutwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner wherePatentdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner wherePatentenddate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner wherePatentnextpaydate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner wherePatentnumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner wherePatentserie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner wherePoliscompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner wherePolisdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner wherePolisenddate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner wherePolisnumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereRegdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereRegenddate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foreigner whereUpdatedAt($value)
 */
	class Foreigner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Position
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Foreigner[] $foreigners
 * @property-read int|null $foreigners_count
 * @method static \Database\Factories\PositionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position query()
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereUpdatedAt($value)
 */
	class Position extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $surname
 * @property int $company_id
 * @property int|null $role_id
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Position $position
 * @property-read \App\Models\Role|null $role
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

