<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://hyperf.org
 * @document https://wiki.hyperf.org
 * @contact  group@hyperf.org
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace Hyperf\DbConnection\Cache;

use Hyperf\Framework\ApplicationContext;

trait Cacheable
{
    /**
     * Fetch a model from cache.
     * @return null|self
     */
    public static function findFromCache($id)
    {
        $container = ApplicationContext::getContainer();
        $manager = $container->get(Manager::class);

        return $manager->findFromCache($id, static::class);
    }

    /**
     * Fetch models from cache.
     * @return \Hyperf\Database\Model\Collection
     */
    public static function findManyFromCache($ids)
    {
        $container = ApplicationContext::getContainer();
        $manager = $container->get(Manager::class);

        return $manager->findManyFromCache($ids, static::class);
    }

    /**
     * Delete model from cache.
     * @return bool
     */
    public function deleteCache()
    {
        $container = ApplicationContext::getContainer();
        $manager = $container->get(Manager::class);

        return $manager->destroy([$this->getKey()], get_called_class());
    }
}
