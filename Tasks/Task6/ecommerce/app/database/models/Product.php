<?php
include_once __DIR__ . '\..\config\database.php';
include_once __DIR__ . '\..\config\crud.php';
class Product extends database
{
    private $id;
    private $name_en;
    private $name_ar;
    private $desc_en;
    private $desc_ar;
    private $price;
    private $quantity;
    private $code;
    private $status;
    private $image;
    private $subcategory_id;
    private $category_id;
    private $brand_id;
    private $created_at;
    private $updated_at;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name_en
     */
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * Get the value of name_ar
     */
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }

    /**
     * Get the value of desc_en
     */
    public function getDesc_en()
    {
        return $this->desc_en;
    }

    /**
     * Set the value of desc_en
     *
     * @return  self
     */
    public function setDesc_en($desc_en)
    {
        $this->desc_en = $desc_en;

        return $this;
    }

    /**
     * Get the value of desc_ar
     */
    public function getDesc_ar()
    {
        return $this->desc_ar;
    }

    /**
     * Set the value of desc_ar
     *
     * @return  self
     */
    public function setDesc_ar($desc_ar)
    {
        $this->desc_ar = $desc_ar;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    /**
     * Get the value of category_id
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }
    /**
     * Get the value of subcategory_id
     */
    public function getSubcategory_id()
    {
        return $this->subcategory_id;
    }

    /**
     * Set the value of subcategory_id
     *
     * @return  self
     */
    public function setSubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;

        return $this;
    }

    /**
     * Get the value of brand_id
     */
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }


    public function create()
    {
    }
    public function read()
    {
        $query = "SELECT `id`,`name_en`,`desc_en`,`price`,`image` FROM `products` WHERE `status` = $this->status ORDER BY `price`,`name_en`";
        return $this->runDQL($query);
    }
    public function update()
    {
    }
    public function delete()
    {
    }
    public function getProductsBySub()
    {
        $query = "SELECT * FROM `products_details` WHERE `subcategory_id` = $this->subcategory_id  ORDER BY `price`,`name_en`";
        return $this->runDQL($query);
    }
    public function getProductsByCat()
    {
        $query = "SELECT * FROM `products_details` WHERE `category_id` = $this->category_id  ORDER BY `price`,`name_en`";
        return $this->runDQL($query);
    }
    public function getProductsByBrand()
    {
        $query = "SELECT * FROM `products_details` WHERE `brand_id` = $this->brand_id  ORDER BY `price`,`name_en`";
        return $this->runDQL($query);
    }

    
    public function checkIfProExists()
    {
        $query = "SELECT * FROM `products_details` WHERE `id` = $this->id ";
        return $this->runDQL($query);
    }

    public function getProductSpecs()
    {
        $query = "  SELECT
                        `products_specs`.*,
                        `specs`.`spec_en`,
                        `specs`.`spec_ar`
                    FROM
                        `products_specs`
                    JOIN `specs`
                    ON `specs`.`id` = `products_specs`.`spec_id`
                    WHERE `product_id` = $this->id";
        return $this->runDQL($query);

    }

    public function getProductReviews()
    {
        $query = "SELECT
                    `reviews`.*,
                    CONCAT(`users`.`first_name` , ' ' , `users`.`last_name`) AS `fullname`
                FROM
                    `reviews`
                JOIN `users` ON `users`.`id` = `reviews`.`user_id`
                WHERE `product_id` = $this->id";
    return $this->runDQL($query);
    }

    
}
