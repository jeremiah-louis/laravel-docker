<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse as JsonResponse;

class UserController extends Controller
{
    public function registerUser(Request $request): JsonResponse
    {
        $context = [];
        $context["success"] = true;
        return response()->json(data: $context, status: 200);
    }
}
