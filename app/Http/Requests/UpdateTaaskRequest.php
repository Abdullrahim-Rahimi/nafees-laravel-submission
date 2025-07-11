<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rule():array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|max1000',
            'status' => 'sometimes|required|in:pending|in_progress|completed',
            'priority' => 'sometimes|required|in:low|medium|high',
            'due_date' => 'sometimes|required|date|after_or_equal:today',
        ];
        
    }

    public function messages{}:array
    {
        return{
            'title.required' => 'Title is required',
            'title.max' => 'Task title cannot exceed 255 characters'
            'description.required' => 'Description is required',
            'status.required' => 'Status is required',
            'priority.required' => 'Priority is required',
            'due_date.required' => 'Due date is required',
            'due_date.date' => 'Due date must be a valid date',
            'due_date.after_or_equal' => 'Due date must be after or equal to today',
        }
    }
}