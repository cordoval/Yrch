<?php

namespace Yrch\YrchBundle\Tests\Entity;

use Yrch\YrchBundle\Entity\User;
use Yrch\YrchBundle\Entity\Site;
use Yrch\YrchBundle\Entity\Review;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Test class for User
 *
 * @author Christophe Coevoet
 * @copyright (c) 2010, Tolkiendil, Association loi 1901
 * @license GPLv2 (http://www.opensource.org/licenses/gpl-2.0.php)
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var User
     */
    private $user;

    public function  setUp()
    {
        $this->user = new User();
    }

    public function testNick()
    {
        $this->assertNull($this->user->getNick());

        $this->user->setNick('test');
        $this->assertEquals('test', $this->user->getNick());
    }

    public function testPreferedLocale()
    {
        $this->assertNull($this->user->getPreferedLocale());

        $this->user->setPreferedLocale('en');
        $this->assertEquals('en', $this->user->getPreferedLocale());
    }

    public function testTheme()
    {
        $this->assertEquals('default', $this->user->getTheme());

        $this->user->setTheme('yrch');
        $this->assertEquals('yrch', $this->user->getTheme());
    }

    public function testOutlink()
    {
        $this->assertEquals('_blank', $this->user->getOutlink());

        $this->user->setOutlink('yrch_outlink');
        $this->assertEquals('yrch_outlink', $this->user->getOutlink());
    }

    public function testContactAllowed()
    {
        $this->assertTrue($this->user->isContactAllowed());

        $this->user->setContactAllowed(false);
        $this->assertFalse($this->user->isContactAllowed());
    }

    public function testSitesPerPage()
    {
        $this->assertEquals(10, $this->user->getSitesPerPage());

        $this->user->setSitesPerPage(25);
        $this->assertEquals(25, $this->user->getSitesPerPage());
    }

    public function testReviewsPerPage()
    {
        $this->assertEquals(25, $this->user->getReviewsPerPage());

        $this->user->setReviewsPerPage(10);
        $this->assertEquals(10, $this->user->getReviewsPerPage());
    }

    public function testSiteNotifications()
    {
        $this->assertTrue($this->user->getSiteNotifications(), 'Site notifications are enabled by default');

        $this->user->setSiteNotifications(false);
        $this->assertFalse($this->user->getSiteNotifications());
    }

    public function testReviewNotifications()
    {
        $this->assertTrue($this->user->getReviewNotifications(), 'Review notifications are enabled by default');

        $this->user->setReviewNotifications(false);
        $this->assertFalse($this->user->getReviewNotifications());
    }

    public function testSites()
    {
        $this->assertEquals(new ArrayCollection(), $this->user->getSites(), 'A new user has no site');

        $site = new Site();
        $this->user->addSite($site);
        $this->assertContains($site, $this->user->getSites());
    }

    public function testFavorites()
    {
        $this->assertEquals(new ArrayCollection(), $this->user->getFavorites(), 'A new user has no favorite');

        $site = new Site();
        $this->user->addFavorite($site);
        $this->assertContains($site, $this->user->getFavorites());

        $this->assertTrue($this->user->isFavorite($site));
    }

    public function testReviews()
    {
        $this->assertEquals(new ArrayCollection(), $this->user->getReviews(), 'A new user has no review');

        $review = new Review();
        $this->user->addReview($review);
        $this->assertEquals($this->user, $review->getOwner());
        $this->assertContains($review, $this->user->getReviews());
    }
}
