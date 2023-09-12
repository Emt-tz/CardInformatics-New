-- CreateTable
CREATE TABLE `applicant` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `application_code` VARCHAR(40) NOT NULL DEFAULT '0',
    `user_id` INTEGER NOT NULL DEFAULT 0,
    `type_of_loan` VARCHAR(256) NOT NULL DEFAULT '0',
    `currency` VARCHAR(10) NOT NULL DEFAULT 'TZS',
    `loan_amount` VARCHAR(100) NOT NULL DEFAULT '0',
    `purpose_of_loan` VARCHAR(250) NOT NULL DEFAULT '0',
    `existing_loan` VARCHAR(255) NOT NULL DEFAULT '0',
    `lender` VARCHAR(255) NOT NULL DEFAULT 'No',
    `total_existing_loan` VARCHAR(100) NOT NULL DEFAULT 'Tsh. 0',
    `employer` VARCHAR(255) NOT NULL DEFAULT '0',
    `designation` VARCHAR(255) NOT NULL DEFAULT '0',
    `employed_from` VARCHAR(20) NOT NULL DEFAULT '0',
    `employed_to` VARCHAR(20) NOT NULL DEFAULT '0',
    `business_name` VARCHAR(60) NOT NULL DEFAULT 'N/A',
    `business_location` VARCHAR(60) NOT NULL DEFAULT 'N/A',
    `previous_employer` VARCHAR(255) NOT NULL DEFAULT '0',
    `previous_designation` VARCHAR(255) NOT NULL DEFAULT '0',
    `previous_employed_from` VARCHAR(20) NOT NULL DEFAULT '0',
    `previous_employed_to` VARCHAR(20) NOT NULL DEFAULT '0',
    `R_nida_no` VARCHAR(20) NOT NULL DEFAULT '0',
    `R_f_name` VARCHAR(60) NOT NULL DEFAULT '0',
    `R_birth_date` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_martial_status` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_professional` VARCHAR(60) NOT NULL DEFAULT '0',
    `R_email` VARCHAR(60) NOT NULL DEFAULT '0',
    `R_p_number` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_response` VARCHAR(30) NOT NULL DEFAULT 'None',
    `R_comment` VARCHAR(255) NOT NULL DEFAULT 'None',
    `annual_salary` VARCHAR(100) NOT NULL DEFAULT '0',
    `supplimentary_income` VARCHAR(100) NOT NULL DEFAULT '0',
    `s_employed_income` VARCHAR(100) NOT NULL DEFAULT '0',
    `other_income` VARCHAR(100) NOT NULL DEFAULT '0',
    `income_source` VARCHAR(255) NOT NULL DEFAULT '0',
    `total_annual_income` VARCHAR(100) NOT NULL DEFAULT '0',
    `collateral_name` VARCHAR(60) NOT NULL DEFAULT 'None',
    `collateral_value` VARCHAR(60) NOT NULL DEFAULT '0',
    `salary_statement` VARCHAR(100) NOT NULL DEFAULT '0',
    `bank_statement` VARCHAR(32) NOT NULL DEFAULT '0',
    `money_statement` VARCHAR(32) NOT NULL DEFAULT '0',
    `start_credit_date` VARCHAR(70) NOT NULL DEFAULT '0',
    `loan_status` VARCHAR(10) NOT NULL DEFAULT 'Active',
    `locked_status` VARCHAR(20) NOT NULL DEFAULT '0',
    `bank_id` VARCHAR(11) NOT NULL DEFAULT '0',
    `bankAdm_email` VARCHAR(255) NOT NULL DEFAULT '0',
    `bankAdm_no` VARCHAR(30) NOT NULL DEFAULT '0',
    `bankAdm_message` VARCHAR(500) NOT NULL DEFAULT 'None',
    `approve_code` VARCHAR(50) NOT NULL DEFAULT '0',
    `approval_date` VARCHAR(70) NOT NULL DEFAULT '0',
    `approval_date1` VARCHAR(30) NOT NULL DEFAULT '0',
    `delete_status` INTEGER NOT NULL DEFAULT 0,
    `deleted_coz` VARCHAR(255) NOT NULL DEFAULT 'None',
    `deleted_Date` VARCHAR(30) NOT NULL DEFAULT '0',
    `expiry_date` VARCHAR(70) NOT NULL DEFAULT '0',
    `accepted_status` INTEGER NOT NULL DEFAULT 0,
    `accepted_by` VARCHAR(60) NOT NULL DEFAULT '0',
    `accepted_date` VARCHAR(30) NOT NULL DEFAULT '0',

    UNIQUE INDEX `id`(`id`),
    INDEX `bank_id`(`bank_id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `applicant_documents` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `application_code` VARCHAR(70) NOT NULL,
    `application_id` INTEGER NOT NULL DEFAULT 0,
    `name` VARCHAR(70) NOT NULL,
    `loan` INTEGER NOT NULL DEFAULT 0,
    `query` INTEGER NOT NULL DEFAULT 0,
    `date_time` VARCHAR(70) NOT NULL,

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `applicant_interest` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `date_created` VARCHAR(30) NOT NULL DEFAULT '0',
    `application_code` VARCHAR(30) NOT NULL DEFAULT '0',
    `loan_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `user_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `bank_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `currency` VARCHAR(30) NOT NULL DEFAULT 'TZS',
    `p_loan_amount` VARCHAR(30) NOT NULL DEFAULT '0',
    `interest_charge` VARCHAR(70) NOT NULL DEFAULT '0',
    `annual_fee` VARCHAR(70) NOT NULL DEFAULT '0',
    `late_payment_fee` VARCHAR(70) NOT NULL DEFAULT '0',
    `other_fee` VARCHAR(70) NOT NULL DEFAULT '0',
    `special_feature` VARCHAR(256) NOT NULL DEFAULT 'None',
    `payback_periods` VARCHAR(70) NOT NULL DEFAULT '0',
    `bankAdm_email` VARCHAR(70) NOT NULL DEFAULT '0',
    `accepted` INTEGER NOT NULL DEFAULT 0,

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `bank` (
    `date` VARCHAR(70) NOT NULL,
    `bank_id` VARCHAR(11) NOT NULL,
    `bank_name` VARCHAR(100) NOT NULL,
    `institution_type` VARCHAR(100) NOT NULL,
    `regulator` VARCHAR(100) NOT NULL,

    PRIMARY KEY (`bank_id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `calls_visits` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `date` VARCHAR(30) NOT NULL DEFAULT '00/00/000',
    `stakeholder_name` VARCHAR(300) NOT NULL DEFAULT 'None',
    `stakeholder_title` VARCHAR(300) NOT NULL DEFAULT 'None',
    `stakeholder_p_number` VARCHAR(30) NOT NULL DEFAULT '0',
    `call_or_visit` VARCHAR(30) NOT NULL DEFAULT 'None',
    `call_details` VARCHAR(60) NOT NULL DEFAULT 'None',
    `visit_details` VARCHAR(60) NOT NULL DEFAULT 'None',
    `details` VARCHAR(300) NOT NULL DEFAULT 'None',
    `comment` VARCHAR(300) NOT NULL DEFAULT 'None',
    `Adm_email` VARCHAR(30) NOT NULL DEFAULT 'None',

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `credit_offer` (
    `date` VARCHAR(20) NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `promotion_code` VARCHAR(40) NOT NULL DEFAULT '0',
    `bank_id` INTEGER NOT NULL DEFAULT 0,
    `bankAdm_email` VARCHAR(50) NOT NULL DEFAULT '0',
    `bankAdm_no` VARCHAR(20) NOT NULL DEFAULT '0',
    `institution_type` VARCHAR(100) NOT NULL DEFAULT '0',
    `number_of_employees` VARCHAR(255) NOT NULL DEFAULT '0',
    `loan_history` VARCHAR(255) NOT NULL DEFAULT '0',
    `credit_type` VARCHAR(100) NOT NULL DEFAULT '0',
    `credit_product` VARCHAR(100) NOT NULL DEFAULT '0',
    `currency` VARCHAR(70) NOT NULL DEFAULT '0',
    `credit_limit` VARCHAR(255) NOT NULL DEFAULT '0',
    `interest_charge` VARCHAR(20) NOT NULL DEFAULT '0',
    `annual_fee` VARCHAR(255) NOT NULL DEFAULT '0',
    `late_payment_fee` VARCHAR(255) NOT NULL DEFAULT '0',
    `other_fee` VARCHAR(255) NOT NULL DEFAULT '0',
    `additional_info` VARCHAR(320) NOT NULL DEFAULT '0',
    `payback_periods` VARCHAR(70) NOT NULL DEFAULT '0',
    `app_deadline` VARCHAR(20) NOT NULL DEFAULT '0',
    `expiry` INTEGER NOT NULL DEFAULT 0,
    `app_expire` DATE NOT NULL,
    `del_bankAdm_email` VARCHAR(50) NOT NULL DEFAULT '0',
    `del_date` VARCHAR(30) NOT NULL DEFAULT '0',

    INDEX `bank_id`(`bank_id`),
    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `credit_offer_apply` (
    `application_date` VARCHAR(70) NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `existing_loan` VARCHAR(255) NOT NULL DEFAULT '0',
    `lender` VARCHAR(255) NOT NULL DEFAULT '0',
    `total_existing_loan` VARCHAR(255) NOT NULL DEFAULT '0',
    `c_employer` VARCHAR(70) NOT NULL DEFAULT '0',
    `c_designation` VARCHAR(70) NOT NULL DEFAULT '0',
    `c_employed_from` VARCHAR(30) NOT NULL DEFAULT '0',
    `c_employed_to` VARCHAR(70) NOT NULL DEFAULT 'Present',
    `business_name` VARCHAR(60) NOT NULL DEFAULT 'None',
    `business_location` VARCHAR(60) NOT NULL DEFAULT 'None',
    `R_nida_no` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_f_name` VARCHAR(60) NOT NULL DEFAULT '0',
    `R_birth_date` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_martial_status` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_professional` VARCHAR(60) NOT NULL DEFAULT '0',
    `R_email` VARCHAR(60) NOT NULL DEFAULT '0',
    `R_p_number` VARCHAR(20) NOT NULL DEFAULT '0',
    `R_response` VARCHAR(30) NOT NULL DEFAULT 'None',
    `R_comment` VARCHAR(255) NOT NULL DEFAULT 'None',
    `income_currency` VARCHAR(15) NOT NULL DEFAULT 'TZS',
    `annual_salary` VARCHAR(30) NOT NULL DEFAULT '0',
    `s_employed_income` VARCHAR(60) NOT NULL DEFAULT '0',
    `other_income` VARCHAR(30) NOT NULL DEFAULT '0',
    `supplimentary_income` VARCHAR(30) NOT NULL DEFAULT '0',
    `income_source` VARCHAR(60) NOT NULL DEFAULT '0',
    `total_annual_income` VARCHAR(30) NOT NULL DEFAULT '0',
    `salary_statement` VARCHAR(10) NOT NULL DEFAULT '0',
    `bank_statement` VARCHAR(10) NOT NULL DEFAULT '0',
    `money_statement` VARCHAR(10) NOT NULL DEFAULT '0',
    `credit_offer_id` INTEGER NOT NULL DEFAULT 0,
    `bank_id` INTEGER NOT NULL DEFAULT 0,
    `bankAdm_email` VARCHAR(255) NOT NULL DEFAULT '0',
    `bankAdm_no` VARCHAR(70) NOT NULL DEFAULT '0',
    `bankAdm_message` VARCHAR(500) NOT NULL DEFAULT 'None',
    `user_id` INTEGER NOT NULL DEFAULT 0,
    `apply_status` VARCHAR(30) NOT NULL DEFAULT 'Pending',
    `credit_offer_code` VARCHAR(50) NOT NULL DEFAULT '0',
    `approval_date` VARCHAR(20) NOT NULL DEFAULT '0',
    `delete_status` INTEGER NOT NULL,
    `deleted_coz` VARCHAR(255) NOT NULL DEFAULT 'None',
    `deleted_date` VARCHAR(30) NOT NULL DEFAULT '0',
    `accepted_status` INTEGER NOT NULL DEFAULT 0,
    `accepted_by` VARCHAR(60) NOT NULL DEFAULT 'None',
    `accepted_date` VARCHAR(30) NOT NULL DEFAULT '0',
    `query` INTEGER NOT NULL DEFAULT 0,

    INDEX `credit_offer_id`(`credit_offer_id`, `bank_id`, `user_id`),
    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `credit_offer_documents` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL DEFAULT 0,
    `promotion_code` VARCHAR(70) NOT NULL DEFAULT '0',
    `name` VARCHAR(70) NOT NULL DEFAULT '0',
    `credit` INTEGER NOT NULL DEFAULT 0,
    `query` INTEGER NOT NULL DEFAULT 0,
    `date_time` VARCHAR(70) NOT NULL DEFAULT '0',

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `credit_offer_query` (
    `date` VARCHAR(30) NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `credit_apply_id` INTEGER NOT NULL DEFAULT 0,
    `credit_offer_id` INTEGER NOT NULL DEFAULT 0,
    `bank_id` INTEGER NOT NULL DEFAULT 0,
    `bankAdm_email` VARCHAR(70) NOT NULL DEFAULT '0',
    `bankAdm_no` VARCHAR(30) NOT NULL DEFAULT '0',
    `user_id` INTEGER NOT NULL DEFAULT 0,
    `query` VARCHAR(255) NOT NULL DEFAULT '0',
    `reply` VARCHAR(255) NOT NULL DEFAULT '0',
    `status` INTEGER NOT NULL DEFAULT 0,

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `feedback` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `feedback_no` VARCHAR(30) NOT NULL DEFAULT '0',
    `f_name` VARCHAR(50) NOT NULL DEFAULT '0',
    `email` VARCHAR(50) NOT NULL DEFAULT '0',
    `feedback` VARCHAR(255) NOT NULL DEFAULT '0',
    `date_created` VARCHAR(30) NOT NULL DEFAULT '0',

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `loginlogs` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `IpAddress` VARBINARY(16) NOT NULL,
    `TryTime` BIGINT NOT NULL,

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `loginlogs_data` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` VARCHAR(10) NOT NULL DEFAULT '0',
    `email` VARCHAR(40) NOT NULL DEFAULT '0',
    `date_time_in` VARCHAR(30) NOT NULL DEFAULT '0',
    `date_time_out` VARCHAR(30) NOT NULL DEFAULT '0',

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `merch_applicant_tour` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `date_created` VARCHAR(20) NOT NULL DEFAULT '0',
    `applicant_tour_code` VARCHAR(20) NOT NULL DEFAULT '0',
    `merch_id` VARCHAR(20) NOT NULL DEFAULT '0',
    `merch_Adm_id` VARCHAR(60) NOT NULL DEFAULT '0',
    `merch_Adm_email` VARCHAR(60) NOT NULL DEFAULT 'None',
    `merch_Adm_no` VARCHAR(20) NOT NULL DEFAULT '0',
    `tour_location` VARCHAR(60) NOT NULL DEFAULT 'None',
    `specific_location` VARCHAR(60) NOT NULL DEFAULT 'None',
    `route_name` VARCHAR(60) NOT NULL DEFAULT 'None',
    `days` VARCHAR(10) NOT NULL DEFAULT '0',
    `currency` VARCHAR(20) NOT NULL DEFAULT 'None',
    `pay_adult` VARCHAR(30) NOT NULL DEFAULT '0',
    `pay_teenager` VARCHAR(20) NOT NULL DEFAULT '0',
    `pay_child` VARCHAR(30) NOT NULL DEFAULT '0',
    `additional_info` VARCHAR(300) NOT NULL DEFAULT 'None',
    `status` INTEGER NOT NULL DEFAULT 0,
    `expiry_date` VARCHAR(20) NOT NULL DEFAULT 'None',
    `expiry` VARCHAR(20) NOT NULL,
    `cover_image_name` VARCHAR(30) NOT NULL DEFAULT '/assets/diond/1.logo.png',
    `del_Merch_Adm_email` VARCHAR(40) NOT NULL,
    `del_date` DATE NOT NULL,

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `merch_applicant_tour_apply` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `date_created` VARCHAR(30) NOT NULL DEFAULT '0',
    `tour_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `applicant_tour_code` VARCHAR(30) NOT NULL DEFAULT '0',
    `merch_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `user_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `start_date` VARCHAR(30) NOT NULL DEFAULT '0',
    `end_date` VARCHAR(30) NOT NULL DEFAULT '0',
    `no_adult_p` VARCHAR(30) NOT NULL DEFAULT '0',
    `no_teenager_p` VARCHAR(20) NOT NULL DEFAULT '0',
    `no_child_p` VARCHAR(30) NOT NULL DEFAULT '0',
    `no_infant_p` VARCHAR(30) NOT NULL DEFAULT '0',
    `total_payment` VARCHAR(60) NOT NULL DEFAULT '0',
    `payment_loan` VARCHAR(30) NOT NULL DEFAULT '0',
    `existing_loan` VARCHAR(255) NULL DEFAULT '0',
    `lender` VARCHAR(255) NOT NULL DEFAULT '0',
    `total_existing_loan` VARCHAR(70) NOT NULL DEFAULT '0',
    `c_employer` VARCHAR(70) NOT NULL DEFAULT '0',
    `c_designation` VARCHAR(70) NOT NULL DEFAULT '0',
    `c_employed_from` VARCHAR(30) NOT NULL DEFAULT '0',
    `c_employed_to` VARCHAR(30) NOT NULL DEFAULT 'Current',
    `business_name` VARCHAR(50) NOT NULL DEFAULT 'None',
    `business_location` VARCHAR(50) NOT NULL DEFAULT 'None',
    `business_type` VARCHAR(50) NOT NULL DEFAULT 'None',
    `R_nida_no` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_f_name` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_birth_date` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_martial_status` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_professional` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_email` VARCHAR(60) NOT NULL DEFAULT '0',
    `R_p_number` VARCHAR(30) NOT NULL DEFAULT '0',
    `R_response` VARCHAR(30) NOT NULL DEFAULT 'None',
    `R_comment` VARCHAR(250) NOT NULL DEFAULT 'None',
    `currency` VARCHAR(30) NOT NULL DEFAULT 'TZS',
    `annual_salary` VARCHAR(30) NOT NULL DEFAULT '0',
    `s_employed_income` VARCHAR(60) NOT NULL DEFAULT '0',
    `other_income` VARCHAR(30) NOT NULL DEFAULT '0',
    `supplimentary_income` VARCHAR(30) NOT NULL DEFAULT '0',
    `total_annual_income` VARCHAR(30) NOT NULL DEFAULT '0',
    `collateral_name` VARCHAR(50) NOT NULL DEFAULT 'None',
    `collateral_value` VARCHAR(30) NOT NULL DEFAULT '0',
    `salary_statement` VARCHAR(30) NOT NULL DEFAULT '0',
    `bank_statement` VARCHAR(30) NOT NULL DEFAULT '',
    `money_statement` VARCHAR(30) NOT NULL DEFAULT '0',
    `bank_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `bankAdm_email` VARCHAR(30) NOT NULL DEFAULT '0',
    `bankAdm_no` VARCHAR(30) NOT NULL DEFAULT '0',
    `tour_approval_code` VARCHAR(30) NOT NULL DEFAULT '0',
    `approval_date` VARCHAR(30) NOT NULL DEFAULT '0',
    `tour_status` VARCHAR(30) NOT NULL DEFAULT '0',

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `merch_applicant_tour_doc` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `merch_id` VARCHAR(20) NOT NULL DEFAULT '0',
    `user_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `applicant_tour_code` VARCHAR(20) NOT NULL DEFAULT '0',
    `doc_name` VARCHAR(30) NOT NULL DEFAULT 'None',
    `tour` INTEGER NOT NULL DEFAULT 0,
    `loan` INTEGER NOT NULL DEFAULT 0,
    `query` INTEGER NOT NULL DEFAULT 0,
    `date_created` VARCHAR(20) NOT NULL DEFAULT '0',

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `merch_applicant_tour_interest` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `date_created` VARCHAR(30) NOT NULL DEFAULT '0',
    `applicant_tour_code` VARCHAR(70) NOT NULL DEFAULT '0',
    `tour_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `user_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `merch_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `bank_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `bankAdm_email` VARCHAR(70) NOT NULL DEFAULT '0',
    `currency` VARCHAR(70) NOT NULL DEFAULT '0',
    `interest_charge` VARCHAR(70) NOT NULL DEFAULT '0',
    `annual_fee` VARCHAR(70) NOT NULL DEFAULT '0',
    `late_payment_fee` VARCHAR(70) NOT NULL DEFAULT '0',
    `other_fee` VARCHAR(70) NOT NULL DEFAULT '0',
    `payback_periods` VARCHAR(70) NOT NULL DEFAULT '0',
    `authorization` VARCHAR(60) NOT NULL DEFAULT 'None',
    `indemnity` VARCHAR(60) NOT NULL DEFAULT 'None',
    `accepted` INTEGER NOT NULL DEFAULT 0,
    `approved_status` VARCHAR(10) NOT NULL DEFAULT '0',

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `merch_applicant_tour_picture` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `merch_id` VARCHAR(20) NOT NULL DEFAULT '0',
    `user_id` VARCHAR(30) NOT NULL DEFAULT '0',
    `applicant_tour_code` VARCHAR(20) NOT NULL DEFAULT '0',
    `picture_name` VARCHAR(30) NOT NULL DEFAULT '/assets/diond/1.logo.png',
    `tour` INTEGER NOT NULL DEFAULT 0,
    `date_created` VARCHAR(20) NOT NULL DEFAULT '0',

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `merchant` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `date_created` VARCHAR(20) NOT NULL DEFAULT '0',
    `merch_id` VARCHAR(20) NOT NULL DEFAULT '0',
    `merch_name` VARCHAR(100) NOT NULL DEFAULT '0',
    `merchant_type` VARCHAR(60) NOT NULL DEFAULT '0',
    `regulator` VARCHAR(60) NOT NULL DEFAULT '0',
    `business_tin_no` VARCHAR(20) NOT NULL DEFAULT '0',
    `licence_expire` VARCHAR(50) NOT NULL DEFAULT '0',
    `bank_name` VARCHAR(100) NOT NULL DEFAULT '0',
    `bank_branch` VARCHAR(100) NOT NULL DEFAULT '0',
    `account_no` VARCHAR(50) NOT NULL DEFAULT '0',
    `merch_certificate` VARCHAR(50) NOT NULL DEFAULT '0',
    `merch_Adm_email` VARCHAR(60) NOT NULL DEFAULT 'None',
    `updated_by` VARCHAR(60) NOT NULL DEFAULT 'None',
    `updated_date` VARCHAR(60) NOT NULL DEFAULT '0',

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `query` (
    `date` VARCHAR(70) NOT NULL,
    `id` INTEGER NOT NULL DEFAULT 0,
    `application_code` VARCHAR(30) NOT NULL DEFAULT '0',
    `bank_id` INTEGER NOT NULL DEFAULT 0,
    `user_id` INTEGER NOT NULL DEFAULT 0,
    `request_for` VARCHAR(500) NOT NULL DEFAULT '0',
    `reply_to` VARCHAR(500) NOT NULL DEFAULT '0',
    `document1` VARCHAR(10) NOT NULL DEFAULT '0',
    `sec_request` VARCHAR(500) NOT NULL DEFAULT '0',
    `sec_reply` VARCHAR(500) NOT NULL DEFAULT '0',
    `document2` VARCHAR(10) NOT NULL DEFAULT '0',
    `query_status` INTEGER NOT NULL DEFAULT 0,
    `permanet_delete` INTEGER NOT NULL DEFAULT 0,
    `query_end` DATE NOT NULL,

    INDEX `id`(`id`, `bank_id`, `user_id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `registration` (
    `date` VARCHAR(70) NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nida_no` VARCHAR(40) NOT NULL DEFAULT '0',
    `tin_no` VARCHAR(50) NOT NULL DEFAULT '0',
    `passport_no` VARCHAR(50) NOT NULL DEFAULT '0',
    `f_name` VARCHAR(256) NOT NULL DEFAULT '0',
    `l_name` VARCHAR(256) NOT NULL DEFAULT '0',
    `gender` VARCHAR(256) NOT NULL DEFAULT '0',
    `marital_status` VARCHAR(20) NOT NULL DEFAULT '0',
    `birth_date` VARCHAR(256) NOT NULL DEFAULT '00/00/0000',
    `citizenship` VARCHAR(255) NOT NULL DEFAULT '0',
    `bank_id` INTEGER NOT NULL DEFAULT 0,
    `merch_id` INTEGER NOT NULL DEFAULT 0,
    `email` VARCHAR(256) NOT NULL DEFAULT '0',
    `role` INTEGER NULL DEFAULT 2,
    `security_question` VARCHAR(255) NOT NULL DEFAULT '0',
    `security_answer` VARCHAR(255) NOT NULL DEFAULT '0',
    `password` VARCHAR(256) NOT NULL DEFAULT '0',
    `account_status` INTEGER NOT NULL DEFAULT 0,
    `address` VARCHAR(100) NULL DEFAULT '0',
    `ward` VARCHAR(70) NOT NULL DEFAULT '0',
    `street_no` VARCHAR(70) NOT NULL DEFAULT '0',
    `street` VARCHAR(100) NULL DEFAULT '0',
    `district` VARCHAR(20) NULL DEFAULT '0',
    `region` VARCHAR(30) NULL DEFAULT '0',
    `p_number` VARCHAR(20) NULL DEFAULT '',
    `profile_pic` VARCHAR(30) NOT NULL DEFAULT '1avatar1.jpg',
    `last_edited` VARCHAR(30) NOT NULL DEFAULT 'None',
    `edited_by` VARCHAR(30) NOT NULL DEFAULT 'None ',
    `edited_coz` VARCHAR(250) NOT NULL DEFAULT 'None',
    `status` INTEGER NOT NULL DEFAULT 0,
    `locking_cz` VARCHAR(256) NOT NULL DEFAULT 'None',
    `locked_date` VARCHAR(30) NOT NULL DEFAULT '0',
    `locked_date1` VARCHAR(30) NOT NULL DEFAULT '0000-00-00',
    `Adm_email` VARCHAR(40) NOT NULL DEFAULT 'None',

    INDEX `bank_id`(`bank_id`),
    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `registration_deleted` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL DEFAULT 0,
    `name` VARCHAR(70) NOT NULL DEFAULT 'none',
    `email` VARCHAR(70) NOT NULL DEFAULT 'none',
    `p_number` VARCHAR(30) NOT NULL DEFAULT '0',
    `Adm_email` VARCHAR(30) NOT NULL DEFAULT '0',
    `deleted_coz` VARCHAR(255) NOT NULL DEFAULT '0',
    `deleted_date` VARCHAR(30) NOT NULL DEFAULT '0',

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `role` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `role_id` INTEGER NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `url` TEXT NOT NULL,

    UNIQUE INDEX `id`(`id`),
    PRIMARY KEY (`role_id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `subscription` (
    `bank_id` VARCHAR(11) NOT NULL,
    `loan` VARCHAR(10) NOT NULL DEFAULT '0',
    `l_payment_date` VARCHAR(10) NOT NULL DEFAULT '0000-00-00',
    `l_end_date` VARCHAR(10) NOT NULL DEFAULT '0000-00-00',
    `l_admin_email` VARCHAR(60) NOT NULL DEFAULT '0',
    `credit` VARCHAR(10) NOT NULL DEFAULT '0',
    `c_payment_date` VARCHAR(10) NOT NULL DEFAULT '0000-00-00',
    `c_admin_email` VARCHAR(60) NOT NULL DEFAULT '0',
    `c_end_date` VARCHAR(10) NOT NULL DEFAULT '0000-00-00',
    `tour` VARCHAR(10) NOT NULL DEFAULT '0',
    `t_payment_date` VARCHAR(10) NOT NULL DEFAULT '0000-00-00',
    `t_admin_email` VARCHAR(60) NOT NULL DEFAULT '0',
    `t_end_date` VARCHAR(10) NOT NULL DEFAULT '0000-00-00',

    PRIMARY KEY (`bank_id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
