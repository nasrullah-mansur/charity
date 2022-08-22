<?php

    # language

    const PRIMARY_LANGUAGE = 'English';
    const SECONDARY_LANGUAGE = 'French';

    # guard

    const GUARD_ADMIN = 'admin' ;
    const GUARD_SUPERADMIN = 'super_admin' ;

    # admin

    const SUPER = 1;

    #active
    const STATUS_ACTIVE  = 1;
    const STATUS_INACTIVE  = 0;

    const PARENT = 0;

    # user role
    const CAMPAIGNER = 1;
    const DONAR = 2;

    # user status
    const USER_ACTIVE = 1;
    const USER_DEACTIVE = 2;
    const USER_SUSPENDED = 3;

    # gender
    const MALE = 1;
    const FEMALE = 2;
    const OTHERS = 3;

    # campaign

    const CAMPAIGN_PENDIGN = 1;
    const CAMPAIGN_RUNNING = 2;
    const CAMPAIGN_COMPLETED = 3;

    # payment

    const PAYMENT_PAYPAL = 'Paypal';
    const PAYMENT_STRIPE = 'Stripe';

    # stripe
    const  STRIPE_KEY= 'pk_test_FNEjadMkL27et6srOV3T4Bf2';
    const STRIPE_SECRET= 'sk_test_w0lhFcBbRyKnGElG30vdZdsW';

    # withdraw status
    const WITHDRAW_REQUEST = 2;
    const WITHDRAW_SUCCESS = 1;

?>
