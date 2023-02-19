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
     * App\Models\Book
     *
     * @property int $id
     * @property string $name
     * @property string $publication
     * @property string $released_on
     * @property int $page
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Book query()
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book wherePage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book wherePublication($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereReleasedOn($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
     */
    class Book extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Faculty
     *
     * @property int $id
     * @property string $name
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|Faculty newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Faculty newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Faculty query()
     * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereUpdatedAt($value)
     */
    class Faculty extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Student
     *
     * @property int $id
     * @property string $name
     * @property int $roll
     * @property string $batch
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property int $faculty_id
     * @property-read \App\Models\Faculty $faculty
     * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Student query()
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereBatch($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereFacultyId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereRoll($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
     */
    class Student extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Teacher
     *
     * @property int $id
     * @property string $name
     * @property int $salary
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher query()
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereSalary($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUpdatedAt($value)
     */
    class Teacher extends \Eloquent
    {
    }
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
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
     * @property-read int|null $tokens_count
     * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}
