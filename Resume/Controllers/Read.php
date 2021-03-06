<?php

namespace ResumeService\Controllers;

use SPF\Controller;
use SPF\Dependency\DependencyManager;
use SPF\Dependency\Constants;
use \PDO;
use SPF\Models\Collection;

use ResumeService\Models\Content;
use ResumeService\Models\Education;
use ResumeService\Models\Experience;
use ResumeService\Models\Person;
use ResumeService\Models\Skills;
use ResumeService\Models\Social;

class Read extends Controller
{

    protected $db;

    /**
     * Constructor
     *
     * @method __construct
     * @dmManaged
     */
    public function __construct()
    {
        $this->db = DependencyManager::get(Constants::DATABASE)->getMysqlConnection();
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/
     *
     * @return [type]     [description]
     */
    public function listPeople()
    {
        $data = $this->db->query('SELECT * FROM ResumeService.People', PDO::FETCH_ASSOC);
        $this->setModel(new Collection($data, 'ResumeService\Models\People'));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId
     *
     * @return [type]     [description]
     */
    public function getResume()
    {
        $sproc = $this->db->prepare("CALL sp_get_resume(:personId)");
        $sproc->bindParam('personId', $this->params['personId'], PDO::PARAM_INT);
        $sproc->execute();

        $collectionType = array(
            'content',
            'education',
            'experience',
            'skills',
            'social'
        );

        $out = array('profile' => $sproc->fetchAll(PDO::FETCH_CLASS, 'ResumeService\\Models\\Person')[0]);
        $sproc->nextRowset();

        foreach ($collectionType as $type) {
            $out[$type] = $sproc->fetchAll(PDO::FETCH_CLASS, 'ResumeService\\Models\\' . ucfirst($type));

            $sproc->nextRowset();
        }

        $this->setModel(new Collection($out));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId/content
     *
     * @return [type]     [description]
     */
    public function getContents()
    {
        $data = $this->db->prepare('SELECT * FROM ResumeService.Content WHERE person_id = :personId');
        $data->bindParam('personId', $this->params['personId'], PDO::PARAM_INT);
        $data->execute();

        $this->setModel(new Collection($data->fetchAll(PDO::FETCH_ASSOC), 'ResumeService\Models\Content'));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId/content/:contentId
     *
     * @return [type]     [description]
     */
    public function getContentItem()
    {
        $data = $this->db->prepare('SELECT * FROM ResumeService.Content WHERE id = :contentId AND person_id = :personId');
        $data->bindParam('personId', $this->params['personId'], PDO::PARAM_INT);
        $data->bindParam('contentId', $this->params['contentId'], PDO::PARAM_INT);
        $data->execute();

        $this->setModel(new Collection($data->fetchAll(PDO::FETCH_ASSOC), 'ResumeService\Models\Content'));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId/educations
     *
     * @return [type]     [description]
     */
    public function getEducation()
    {
        $data = $this->db->prepare('SELECT * FROM ResumeService.Education WHERE person_id = :personId');
        $data->bindParam('personId', $this->params['personId'], PDO::PARAM_INT);
        $data->execute();

        $this->setModel(new Collection($data->fetchAll(PDO::FETCH_ASSOC), 'ResumeService\Models\Education'));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId/education/:educationId
     *
     * @return [type]     [description]
     */
    public function getEducationItem()
    {
        $data = $this->db->prepare('SELECT * FROM ResumeService.Education WHERE id = :educationId AND person_id = :personId');
        $data->bindParam('educationId', $this->params['educationId'], PDO::PARAM_INT);
        $data->execute();

        $this->setModel(new Collection($data->fetchAll(PDO::FETCH_ASSOC), 'ResumeService\Models\Education'));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId/experience
     *
     * @return [type]     [description]
     */
    public function getExperiences()
    {
        $data = $this->db->prepare('SELECT * FROM ResumeService.Experience WHERE person_id = :personId');
        $data->bindParam('personId', $this->params['personId'], PDO::PARAM_INT);
        $data->execute();

        $this->setModel(new Collection($data->fetchAll(PDO::FETCH_ASSOC), 'ResumeService\Models\Experience'));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId/experience/:experienceId
     *
     * @return [type]     [description]
     */
    public function getExperienceItem()
    {
        $data = $this->db->prepare('SELECT * FROM ResumeService.Experience WHERE id = :experienceId');
        $data->bindParam('experienceId', $this->params['experienceId'], PDO::PARAM_INT);
        $data->execute();

        $this->setModel(new Collection($data->fetchAll(PDO::FETCH_ASSOC), 'ResumeService\Models\Experience'));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId/skills
     *
     * @return [type]     [description]
     */
    public function getSkills()
    {
        $data = $this->db->prepare('SELECT * FROM ResumeService.Skills WHERE person_id = :personId');
        $data->bindParam('personId', $this->params['personId'], PDO::PARAM_INT);
        $data->execute();

        $this->setModel(new Collection($data->fetchAll(PDO::FETCH_ASSOC), 'ResumeService\Models\Skills'));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId/skills/:skillId
     *
     * @return [type]     [description]
     */
    public function getSkillItem()
    {
        $data = $this->db->prepare('SELECT * FROM ResumeService.Skills WHERE id = :skillId AND person_id = :personId');
        $data->bindParam('personId', $this->params['personId'], PDO::PARAM_INT);
        $data->bindParam('skillId', $this->params['skillId'], PDO::PARAM_INT);
        $data->execute();

        $this->setModel(new Collection($data->fetchAll(PDO::FETCH_ASSOC), 'ResumeService\Models\Skills'));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId/social
     *
     * @return [type]     [description]
     */
    public function getSocialLinks()
    {
        $data = $this->db->prepare('SELECT * FROM ResumeService.Social WHERE person_id = :personId');
        $data->bindParam('personId', $this->params['personId'], PDO::PARAM_INT);
        $data->execute();

        $this->setModel(new Collection($data->fetchAll(PDO::FETCH_ASSOC), 'ResumeService\Models\Social'));
    }

    /**
     * [listPeople description]
     *
     * @method listPeople
     * @path /api/people/:peopleId/social/:socialLinkId
     *
     * @return [type]     [description]
     */
    public function getSocialLinkItem()
    {
        $data = $this->db->prepare('SELECT * FROM ResumeService.Social WHERE id = :socialId AND person_id = :personId');
        $data->bindParam('personId', $this->params['personId'], PDO::PARAM_INT);
        $data->bindParam('socialId', $this->params['socialId'], PDO::PARAM_INT);
        $data->execute();

        $this->setModel(new Collection($data->fetchAll(PDO::FETCH_ASSOC), 'ResumeService\Models\Social'));
    }

}