<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Instructor\InstructorResource;
use App\Http\Resources\Participant\ParticipantResource;
use App\Http\Resources\Wallet\WalletResource;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Participant\ParticipantCourseResource;
use App\Http\Resources\Participant\ParticipantModuleResource;
use App\Http\Resources\Participant\ParticipantTopicResource;
use App\Http\Resources\Participant\ParticipantProjectResource;
use App\Http\Resources\Participant\ParticipantQuestionResource;
use App\Http\Resources\Participant\ParticipantQuizResource;
use App\Http\Resources\Participant\ParticipantPaymentResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstName' => $this->first_name,
            'otherName' => $this->other_name,
            'lastName' => $this->last_name,
            'email' => $this->email,
            'verified' => $this->email_verified_at,
            'type' => $this->type,
            $this->mergeWhen($this->instructor != null, [
                'profile' => new InstructorResource($this->instructor),
                'instructorWallet' => WalletResource::collection($this->instructorWallets),
                'instructorCourses' => CourseResource::collection($this->instructorCourses),
            ]),

            $this->mergeWhen($this->participant != null, [
                'profile' => new ParticipantResource($this->participant),
                'participantCourses' => ParticipantCourseResource::collection($this->participantCourses),
                'participantModules' => ParticipantModuleResource::collection($this->participantModules),
                'participantTopics' => ParticipantTopicResource::collection($this->participantTopics),
                'participantProjects' => ParticipantProjectResource::collection($this->participantProjects),
                'participantQuestions' => ParticipantQuestionResource::collection($this->participantQuestions),
                'participantQuizzes' => ParticipantQuizResource::collection($this->participantQuizzes),
                'participantPayments' => ParticipantPaymentResource::collection($this->participantPayments),
            ]),
        ];
    }
}
