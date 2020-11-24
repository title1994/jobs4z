<?php
namespace Vanguard\Clients;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
class PayPalClient
{
    /**
     * Returns PayPal HTTP context instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public function context()
    {
        return new ApiContext($this->credentials());
    }
    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     *
     * Paste your client_id and client secret as below
     */
    protected function credentials()
    {
        $clientId     = 'AWqX4G68cctSt5kPVczTdYqEHsgYLS8Mya7lLA7ZFCIm9ZkXrDH3De9Sd3Ribyy5K5-qAsulp0kZgZ-J';
        $clientSecret = 'EMtILsbcai3MtQmUPfw0REp0UJcnC9yTlBnRcptb4pXW7RmwEeAXa_pzDbK3t9BLvR-cTrn0o-7PnWlT';
        return new OAuthTokenCredential($clientId, $clientSecret);
    }
}