<?php

namespace CourseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use CourseBundle\Model\ExtendCourse;
use Oro\Bundle\EntityBundle\EntityProperty\DatesAwareInterface;
use Oro\Bundle\EntityBundle\EntityProperty\DatesAwareTrait;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\ConfigField;
use Oro\Bundle\OrganizationBundle\Entity\Organization;
use Oro\Bundle\UserBundle\Entity\User;

/**
 * Entity represents course and handles all related mappings
 *
 * @ORM\Entity(repositoryClass="CourseBundle\Entity\Repository\CourseRepository")
 * @ORM\Table(
 *      name="ororo_course",
 *      indexes={
 *          @ORM\Index(name="idx_ororo_course_name_idx", columns={"name"}),
 *          @ORM\Index(name="idx_ororo_course_created_at", columns={"created_at"}),
 *          @ORM\Index(name="idx_ororo_course_updated_at", columns={"updated_at"}),
 *      }
 * )
 *
 * @JMS\ExclusionPolicy("ALL")
 * @Config(
 *      defaultValues={
 *          "dataaudit"={"auditable"=true},
 *          "security"={
 *              "type"="ACL",
 *              "field_acl_supported" = "true",
 *              "field_acl_enabled"=true,
 *              "show_restricted_fields"=true
 *          }
 *      }
 *)
 *
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class Course extends ExtendCourse implements DatesAwareInterface
{
    use DatesAwareTrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="course_number", type="string", nullable=true)
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     *)
     */
    private $courseNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     *)
     */
    private $name;
    
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get the value of id
     *
     * @return  integer
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  integer  $id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of courseNumber
     *
     * @return  string
     */ 
    public function getCourseNumber()
    {
        return $this->courseNumber;
    }

    /**
     * Set the value of courseNumber
     *
     * @param  string  $courseNumber
     *
     * @return  self
     */ 
    public function setCourseNumber(string $courseNumber)
    {
        $this->courseNumber = $courseNumber;

        return $this;
    }
}
