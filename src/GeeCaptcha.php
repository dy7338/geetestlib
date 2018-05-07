<?php

namespace Dy7338\GeeCaptcha;

/**
 * Class GeeCaptcha.
 */
class GeeCaptcha extends GeetestLib
{
    /**
     * @return bool
     *
     * 判断是否是正确来自GT的服务器，万一down机或者什么的。
     */
    public function isFromGTServer()
    {
        $this->session->set_userdata('gtserver',1);
    }

    /**
     * @return bool|mixed|string
     *
     * 判断验证是否成功
     */
    public function success()
    {
        $result = $this->success_validate(p('geetest_challenge'), p('geetest_validate'), p('geetest_seccode'));

        return $result;
    }

    /**
     * @return int
     *
     * GT 服务器是否有回应
     */
    public function hasAnswer()
    {
        return $this->fail_validate(p('geetest_challenge'), p('geetest_validate'));
    }

    /**
     * @return mixed
     *
     * 判断GT 服务器是否正常
     */
    public function GTServerIsNormal()
    {
        $status = $this->pre_process();
        $this->session->set_userdata('gtserver',$status);

        return $this->get_response_str();
    }
}
