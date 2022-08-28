<?php

namespace MadeITBelgium\EmailDomainValidation;

use Illuminate\Support\Str;

/**
 * Laravel Email Domain validator.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2017 Made I.T. (http://www.madeit.be)
 * @author     Made I.T. <info@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class EmailDomain
{
    protected $version = '1.0.0';
    private $email;
    private $allowedDomains;
    private $notAllowedDomains;

    /**
     * Construct EmailDomain.
     *
     * @param email
     * @param allowedDomains
     * @param notAllowedDomains
     */
    public function __construct($email = null, $allowedDomains = null, $notAllowedDomains = null)
    {
        if ($email != null) {
            $this->setEmail($email);
        }
        if ($allowedDomains != null) {
            $this->setAllowedDomains($allowedDomains);
        }
        if ($notAllowedDomains != null) {
            $this->setNotAllowedDomains($notAllowedDomains);
        }
    }

    /**
     * Set email.
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set allowed Domains.
     *
     * @param string|array $allowedDomains
     */
    public function setAllowedDomains($allowedDomains)
    {
        if (empty($allowedDomains)) {
            $this->allowedDomains = null;
        } elseif (is_array($allowedDomains)) {
            $this->allowedDomains = $allowedDomains;
        } else {
            $this->allowedDomains = func_get_args();
        }
    }

    /**
     * Get allowed Domains.
     *
     * @return array
     */
    public function getAllowedDomains()
    {
        if (is_array($this->allowedDomains)) {
            return $this->allowedDomains;
        }
    }

    /**
     * Set not allowed Domains.
     *
     * @param string|array $notAllowedDomains
     */
    public function setNotAllowedDomains($notAllowedDomains)
    {
        if (empty($notAllowedDomains)) {
            $this->notAllowedDomains = null;
        } elseif (is_array($notAllowedDomains)) {
            $this->notAllowedDomains = $notAllowedDomains;
        } else {
            $this->notAllowedDomains = func_get_args();
        }
    }

    /**
     * Get not allowed Domains.
     *
     * @return array
     */
    public function getNotAllowedDomains()
    {
        if (is_array($this->notAllowedDomains)) {
            return $this->notAllowedDomains;
        }
    }

    public function isEmailValid($email = null)
    {
        if ($email != null) {
            $this->setEmail($email);
        }

        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function areAllowedDomainsValid($allowedDomains = null)
    {
        if ($allowedDomains != null) {
            $this->setAllowedDomains($allowedDomains);
        }
        foreach ($this->allowedDomains as $domain) {
            if (!$this->isDomainnameValid($domain)) {
                return false;
            }
        }

        return true;
    }

    public function areNotAllowedDomainsValid($notAllowedDomains = null)
    {
        if ($notAllowedDomains != null) {
            $this->setNotAllowedDomains($notAllowedDomains);
        }
        foreach ($this->notAllowedDomains as $domain) {
            if (!$this->isDomainnameValid($domain)) {
                return false;
            }
        }

        return true;
    }

    public function isEmailAllowed($email = null, $allowedDomains = null, $notAllowedDomains = null)
    {
        if ($email != null) {
            $this->setEmail($email);
        }
        if ($allowedDomains != null) {
            $this->setAllowedDomains($allowedDomains);
        }
        if ($notAllowedDomains != null) {
            $this->setNotAllowedDomains($notAllowedDomains);
        }

        $isEmailDomainAllowed = $this->checkEmailIsAllowedInDomains() && !$this->checkEmailIsNotAllowedInDomains();

        return $isEmailDomainAllowed;
    }

    public function checkEmailIsAllowedInDomains($email = null, $allowedDomains = null)
    {
        if ($email != null) {
            $this->setEmail($email);
        }
        if ($allowedDomains != null) {
            $this->setAllowedDomains($allowedDomains);
        }

        $isEmailAllowed = false;
        if (!is_array($this->allowedDomains)) {
            return true;
        }
        foreach ($this->allowedDomains as $domain) {
            if ($this->endsWith($this->email, $domain)) {
                $isEmailAllowed = true;
            }
        }

        return $isEmailAllowed;
    }

    public function checkEmailIsNotAllowedInDomains($email = null, $notAllowedDomains = null)
    {
        if ($email != null) {
            $this->setEmail($email);
        }
        if ($notAllowedDomains != null) {
            $this->setNotAllowedDomains($notAllowedDomains);
        }

        $isNotEmailAllowed = false;
        if (!is_array($this->notAllowedDomains)) {
            return false;
        }
        foreach ($this->notAllowedDomains as $domain) {
            if ($this->endsWith($this->email, $domain)) {
                $isNotEmailAllowed = true;
            }
        }

        return $isNotEmailAllowed;
    }

    private function isDomainnameValid($domainname)
    {
        return preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domainname) //valid chars check
         && preg_match('/^.{1,253}$/', $domainname) //overall length check
         && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domainname); //length of each label
    }

    private function endsWith($haystack, $needle)
    {
        $needle = '@'.$needle;

        return Str::endsWith($haystack, $needle);
    }
}
