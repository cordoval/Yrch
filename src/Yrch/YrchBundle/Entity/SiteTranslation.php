<?php

namespace Yrch\YrchBundle\Entity;

use Stof\DoctrineExtensionsBundle\Entity\AbstractTranslation;

/**
 * SiteTranslation
 *
 * @author Christophe Coevoet
 * @copyright (c) 2010, Tolkiendil, Association loi 1901
 * @license GPLv2 (http://www.opensource.org/licenses/gpl-2.0.php)
 *
 * @orm:Table(
 *          name="site_translations",
 *          indexes={@orm:index(name="site_translations_lookup_idx", columns={
 *             "locale", "object_class", "foreign_key"
 *         })},
 *         uniqueConstraints={@orm:UniqueConstraint(name="site_lookup_unique_idx", columns={
 *             "locale", "object_class", "foreign_key", "field"
 *         })}
 * )
 * @orm:Entity(repositoryClass="Gedmo\Translatable\Entity\Repository\TranslationRepository")
 */
class SiteTranslation extends AbstractTranslation
{
}
