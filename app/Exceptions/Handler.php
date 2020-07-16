<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Traits\Api\ApiResponder;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    use ApiResponder;
    
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        switch(class_basename($exception)){

            // case 'ValidationException':
            //     if ($request->expectsJson()){
            //         Log::debug($request->all());
            //         Log::info("API Error: ". $exception);
            //         return $this->convertValidationExceptionToResponse($exception, $request);
            //     }
            // break;

            case 'ModelNotFoundException':
                if ($request->expectsJson()){
                    $modelName = strtolower(class_basename($exception->getModel()));
                    Log::info("API Error: ". $modelName);
                    return $this->errorResponse("{$modelName} does not exist with any specified identifiers", 404);
                }
            break;

            case 'AuthenticatedException':
                if ($request->expectsJson()){
                    Log::debug($request->all());
                    Log::info("API Error: ". $exception);
                    return $this->unauthenticated($request, $exception);
                }
            break;

            case 'AuthorizationException':
                if ($request->expectsJson()){
                    Log::info("API Error: ". $exception->getMessage());
                    return $this->errorResponse($exception->getMessage(), 403);
                }
            break;

            case 'MethodNotAllowedHttpException':
                if ($request->expectsJson()){
                    Log::info("API Error: ". $exception->getMessage());
                    return $this->errorResponse('The specified method for the request is invalid', 405);
                }
            break;

            case 'NotFoundHttpException':
                if ($request->expectsJson()){
                    Log::info("API Error: ". $exception->getMessage());
                    return $this->errorResponse('The specified URL cannot be found', 404);
                }
            break;

            case 'HttpException':
                if ($request->expectsJson()){
                    Log::info("API Error: ". $exception->getMessage());
                    return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
                }
            break;

            case 'QueryException':
                if ($request->expectsJson()){
                    $errorCode = $exception->errorInfo[1];

                    if ($errorCode == 1451) {
                        Log::info("API Error: ". $exception);
                        return $this->errorResponse('Cannot remove the resource permanently. it is related with other resource', 409);
                    }
                }                        
            break;

            case 'AuthorizationException':
                if ($request->expectsJson()){
                    Log::debug($request->all());
                    Log::info("API Error: ". $exception);
                    return $this->errorResponse($exception->getMessage(), 403);
                }                        
            break;

            case 'TokenExpiredException':
                if ($request->expectsJson()){
                    Log::debug($request->all());
                    Log::info("API Error: ". $exception);
                    return $this->errorResponse($exception->getMessage(), 403);
                }                        
            break;

            case 'TokenInvalidException':
                if ($request->expectsJson()){
                    Log::debug($request->all());
                    Log::info("API Error: ". $exception);
                    return $this->errorResponse($exception->getMessage(), 403);
                }                        
            break;

            case 'JWTException':
                if ($request->expectsJson()){
                    Log::debug($request->all());
                    Log::info("API Error: ". $exception);
                    return $this->errorResponse($exception->getMessage(), 403);
                }                        
            break;

            case 'TokenMismatchException':
                return redirect()->back()->withInput($request->input());
            break;

                

            if(config('app.debug')){
                return parent::render($request, $exception);
            }

            return parent::render($request, $exception);
        }
        
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, $exception)
    {
        if ($this->isFrontend($request)) {
            return redirect()->guest('login');
        }
        return $this->errorResponse('Unauthenticated', 401);
    }

    // public function convertValidationExceptionToResponse($e, $request) {
    //     $errors = $e->validator->errors()->getMessages();

    //     if ($this->isFrontend($request)) {
    //         return $request->ajax() ? response()->json($error, 422) : redirect()->back()
    //             ->withInput($request->input())
    //             ->withErrors($errors);
    //     }
        
    //     // $errors = $e->validator->getMessageBag()->getMessages();
    //     return $this->errorResponse($errors, 422);
    // }

    private function isFrontend($request)
    {
        return $request->acceptsHtml() && collect($request->route()->middleware())->contains('web');
    }
}
