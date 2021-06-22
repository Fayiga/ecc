<?php

namespace ECC\Repositories;

use ECC\Category;
use ECC\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use ECC\Contracts\CategoryContract;
use ECC\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use InvalidArgumentException;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class BaseRepository
 *
 * @package \App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryContract
{
    use UploadAble;

    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findCategoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createCategory(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile))
            {
                $image = $this->uploadOne($params['image'], 'categories');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;
            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $category = new Category($merge->all());
            $category->save();
            return $category;

        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');

        if($collection->has('image') && ($params['image'] instanceof UploadedFile))
        {
            if($category->image != null)
            {
                $this->deleteOne($category->image);
            }

            $image = $this->uploadOne($params['image'], 'categories');
        }

        $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;
            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $category->update($merge->all());

            return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);

        if($category->image != null)
        {
            $this->deleteOne($category->image);
        }

        $category->delete();

        return $category;
    }
}
