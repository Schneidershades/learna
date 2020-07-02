<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
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
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException) {
            $this->log($request, $exception);
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }

        if ($exception instanceof ValidationException) {
            $this->log($request, $exception);
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        if ($exception instanceof ModelNotFoundException) {
            $modelName = strtolower(class_basename($exception->getModel()));
            $this->log($request, $exception);
            return $this->errorResponse("Does Not exist any {$modelName} with specified identificator", 404);
        }

        if ($exception instanceof AuthenticatedException) {
            $this->log($request, $exception);
            return $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof ClientException) {
            return $this->errorResponse($exception->getMessage(), 403);
        }

        if ($exception instanceof RequestException) {
            return $this->errorResponse($exception->getMessage(), 403);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            $this->log($request, $exception);
            return $this->errorResponse('The specified method for the request is invalid', 405);
        }

        if ($exception instanceof NotFoundHttpException) {
            $this->log($request, $exception);
            return $this->errorResponse('The specified URL cannot be found', 404);
        }

        if ($exception instanceof HttpException) {
            $this->log($request, $exception);
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }

        if ($exception instanceof QueryException) {
            $errorCode = $exception->errorInfo[1];
            if ($errorCode == 1451) {
                $this->log($request, $exception);
                return $this->errorResponse('Cannot remove the resource permanently. it is related with other resource', 409);
            }
        }

        if ($exception instanceof TokenMismatchException) {
            return redirect()->back()->withInput($request->input());
        }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return $this->errorResponse('user_not_found_please login', 404);
        }

        if ($exception instanceof AuthorizationException) {
            $this->log($request, $exception);
            return $this->errorResponse($exception->getMessage(), 403);
        }

        if ($exception instanceof TokenExpiredException) {
            $this->log($request, $exception);
            return $this->errorResponse($exception->getMessage(), 403);
        }

        if ($exception instanceof TokenInvalidException) {
            $this->log($request, $exception);
            return $this->errorResponse($exception->getMessage(), 403);
        }

        if ($exception instanceof JWTException) {
            $this->log($request, $exception);
            return $this->errorResponse($exception->getMessage(), 403);
        }

        return $this->errorResponse('Unexpected Exception. Try again later', 500);
    }


    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($this->isFrontend($request)) {
            return redirect()->guest('<input type="submit" value="">');
        }
        return $this->errorResponse('Unauthenticated', 401);
    }

    public function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();

        if ($this->isFrontend($request)) {
            return $request->ajax() ? response()->json($error, 422) : redirect()->back()
                ->withInput($request->input())
                ->withErrors($errors);
        }

        // $errors = $e->validator->getMessageBag()->getMessages();
        return $this->errorResponse($errors, 422);
    }

    protected function prepareResponse($request, Exception $e)
    {
        if ($e instanceof AccessDeniedHttpException) {
            return $this->errorResponse('No access is available', 401);
        }
    }

    private function isFrontend($request)
    {
        return $request->acceptsHtml() && collect($request->route()->middleware())->contains('web');
    }

    public function log($request, $exception)
    {
        Log::debug($request->all());
        Log::info("API Error: ". $exception);
    }
}
