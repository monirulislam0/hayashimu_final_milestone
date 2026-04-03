<?php

namespace App\Http\Controllers;

use App\Trait\FlashMessage;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use FlashMessage;
    protected function setPageTitle($title,$subTitle,$meta_tags=null,$metaDescription=null,$metaTitle=null)
    {
        view()->share(['pageTitle'=>$title, 'pageSubTitle' => $subTitle,'metaTags'=>$meta_tags ,'metaDescription'=>$metaDescription,'metaTitle'=>$metaTitle]);
    }

    protected function showErrorPage($errorCode=404,$message=null)
    {
        $data['message'] = $message;
        return response()->view('errors. '.$errorCode,$data,$errorCode);
    }

    /**
     * @param bool $error
     * @param int $responseCode
     * @param array $message
     * @param null $data
     * @return \Illuminate\Http\JsonResponse
     */

    protected function jsonResponse($error=true,$responseCode=200,$message=[],$data=null)
    {
        return response()->json([
            'error'         => $error,
            'response_code' => $responseCode,
            'message'       => $message,
            'data'          => $data
        ]);
    }

    /**
     * @param $route
     * @param $message
     * @param string $type
     * @param bool $error
     * @param bool @withOldInputError
     * @return \Illuminate\Http\RedirectResponse
     */

    protected function responseRedirect($route,$message,$type='info',$error=false,$withOldInputError=false,$id=null)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessage();

        if ($error && $withOldInputError) {
            return redirect()->back()->withInput();
        }
        if ($id != null) {
            return redirect()->route($route, $id);
        }
        return redirect()->route($route);
    }
    /**
     * @param $message
     * @param string $type
     * @param bool $error
     * @param bool $withOldInputError
     * @return \Illuminate\Http\RedirectResponse
     */

    protected function responseRedirectBack($message,$type = 'info',$error=false,$withOldInputError=false)
    {
        $this->setFlashMessage($message,$type);
        $this->showFlashMessage();
        if($error && $withOldInputError){
            return redirect()->back()->withInput();
        }
        return redirect()->back();
    }
}
