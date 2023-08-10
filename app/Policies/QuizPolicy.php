<?php

namespace App\Policies;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuizPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Quiz $quiz): Response
    {
        return $user->isAssignedTo($quiz->id) ? Response::allow() : Response::denyAsNotFound();
    }

}
