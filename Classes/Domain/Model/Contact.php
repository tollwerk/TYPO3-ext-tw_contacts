<?php

/**
 * Contact
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwContacts
 * @author     Klaus Fiedler <klaus@tollwerk.de>
 * @license    MIT https://opensource.org/licenses/MIT
 */

namespace Tollwerk\TwContacts\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Contact
 *
 * @package  Tollwerk\TwContacts
 */
class Contact extends AbstractEntity
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_DIVERSE = 3;

    /**
     * Given name
     *
     * @var string
     */
    protected string $givenName = '';

    /**
     * Family name
     *
     * @var string
     */
    protected string $familyName = '';

    /**
     * Title
     *
     * @var string
     */
    protected string $title = '';

    /**
     * Full name = given name + family name
     *
     * @var string
     */
    protected string $fullName = '';

    /**
     * Gender
     *
     * @var int
     */
    protected int $gender = 0;

    /**
     * @var string
     */
    protected string $description = '';

    /**
     * Fax
     *
     * @var string
     */
    protected string $fax = '';

    /**
     * Role
     *
     * @var string
     */
    protected string $role = '';

    /**
     * Organization
     *
     * @var string
     */
    protected string $organization = '';

    /**
     * Portrait
     *
     * @var ?FileReference
     */
    protected ?FileReference $portrait = null;

    /**
     * Phone number
     *
     * @var string
     */
    protected string $phone = '';

    /**
     * Private phone number
     *
     * @var string
     */
    protected string $phonePrivate = '';

    /**
     * @var string
     */
    protected string $phoneMobile = '';

    /**
     * Email address
     *
     * @var string
     */
    protected string $email = '';

    /**
     * Website
     *
     * @var string
     */
    protected string $website = '';

    /**
     * Latitude
     *
     * @var ?float
     */
    protected ?float $latitude = null;

    /**
     * Longitude
     *
     * @var ?float
     */
    protected ?float $longitude = null;

    /**
     * Calculated distance.
     *
     * @var ?int
     */
    protected ?int $distance = null;

    /**
     * Address
     *
     * @var string
     */
    protected string $address = '';

    /**
     * @return string
     */
    public function getGivenName(): string
    {
        return $this->givenName;
    }

    /**
     * @param string $givenName
     */
    public function setGivenName(string $givenName): void
    {
        $this->givenName = $givenName;
    }

    /**
     * @return string
     */
    public function getFamilyName(): string
    {
        return $this->familyName;
    }

    /**
     * @param string $familyName
     */
    public function setFamilyName(string $familyName): void
    {
        $this->familyName = $familyName;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return int
     */
    public function getGender(): int
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax(string $fax): void
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getOrganization(): string
    {
        return $this->organization;
    }

    /**
     * @param string $organization
     */
    public function setOrganization(string $organization): void
    {
        $this->organization = $organization;
    }

    /**
     * @return FileReference|null
     */
    public function getPortrait(): ?FileReference
    {
        return $this->portrait;
    }

    /**
     * @param FileReference|null $portrait
     */
    public function setPortrait(?FileReference $portrait): void
    {
        $this->portrait = $portrait;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhonePrivate(): string
    {
        return $this->phonePrivate;
    }

    /**
     * @param string $phonePrivate
     */
    public function setPhonePrivate(string $phonePrivate): void
    {
        $this->phonePrivate = $phonePrivate;
    }

    /**
     * @return string
     */
    public function getPhoneMobile(): string
    {
        return $this->phoneMobile;
    }

    /**
     * @param string $phoneMobile
     */
    public function setPhoneMobile(string $phoneMobile): void
    {
        $this->phoneMobile = $phoneMobile;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     */
    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     */
    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return int|null
     */
    public function getDistance(): ?int
    {
        return $this->distance;
    }

    /**
     * @param int|null $distance
     */
    public function setDistance(?int $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
}
