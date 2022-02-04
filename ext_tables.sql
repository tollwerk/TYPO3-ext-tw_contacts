#
# Table structure for table 'tx_twfischer_domain_model_contact'
#
CREATE TABLE tx_twcontacts_domain_model_contact
(
    uid           INT(11)                         NOT NULL AUTO_INCREMENT,
    pid           INT(11)             DEFAULT '0' NOT NULL,

    # Basic information
    gender        TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
    title         VARCHAR(255)        DEFAULT ''  NOT NULL,
    given_name    VARCHAR(255)        DEFAULT ''  NOT NULL,
    family_name   VARCHAR(255)        DEFAULT ''  NOT NULL,
    full_name     VARCHAR(255)        DEFAULT ''  NOT NULL,
    portrait      INT(11) UNSIGNED                NOT NULL DEFAULT '0',
    description   TEXT                DEFAULT ''  NOT NULL,

    # Contact
    phone         VARCHAR(255)        DEFAULT ''  NOT NULL,
    phone_private VARCHAR(255)        DEFAULT ''  NOT NULL,
    phone_mobile  VARCHAR(255)        DEFAULT ''  NOT NULL,
    fax           VARCHAR(255)        DEFAULT ''  NOT NULL,
    email         VARCHAR(255)        DEFAULT ''  NOT NULL,
    website       VARCHAR(255)        DEFAULT ''  NOT NULL,

    # Address
    role          VARCHAR(255)        DEFAULT ''  NOT NULL,
    organization  VARCHAR(255)        DEFAULT ''  NOT NULL,
    address       TEXT                DEFAULT ''  NOT NULL,
    longitude     DECIMAL(19, 16)                 NULL,
    latitude      DECIMAL(19, 16)                 NULL,

    sorting       INT(11)             DEFAULT '0' NOT NULL,
    tstamp        INT(11) UNSIGNED    DEFAULT '0' NOT NULL,
    crdate        INT(11) UNSIGNED    DEFAULT '0' NOT NULL,
    cruser_id     INT(11) UNSIGNED    DEFAULT '0' NOT NULL,
    deleted       TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
    hidden        TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
    starttime     INT(11) UNSIGNED    DEFAULT '0' NOT NULL,
    endtime       INT(11) UNSIGNED    DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid)

);
