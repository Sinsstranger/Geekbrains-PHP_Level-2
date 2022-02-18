<?php

class Product
{
	protected string $name;
	protected string $description;
	protected int $price;
	protected string $image;
	protected mixed $characteristics = [];

	public function __construct($name, $price, $image = 'data:image/webp;base64,UklGRroEAABXRUJQVlA4IK4EAACQIACdASrIAJYAPikUiEMhoSERK4wQGAKEs7dwuv3oJ8A1Mrw3yAdDs4b7ZyjzgPyX/qt8B+yXqA/Vz9lvZ0/gHsA/UP/afqT8gH7SdYB6AH6k+ql/vfYm/a39ufgI/ZD//3VzoT/LD53sbfWfyz0S3+AyU36l2t34gc5H+P/6bzg7wagB/KP7f/pPuO+Dr/h/vXmy/Jf7R/1/cG/Vv/edeL9nfZL/bQKWujHD5EQfWPNqafIiD6x5tTT5EQfWPNqaTSjqZbpT0FMWJbswuelLZdZOeSEfZ5iwqJc5AXHgkIp8lBqX4Vscm8tQYi688J2WIHACIPrHm2SQm0xjh8iIPrHm1NPkRB9Y82ppMAD+/g/z9sfeI7zj/tXf73a/f79/v9jwAAJ7dpWbcoenwU+7himViV6hw0dH01avt4xeKtt/6z/x4exTKRCI6ZaEywsZRPZmzLfnfJGvuxWx//9YR+xf3JAqPkM1sx0wyIPlb0ALuUprn2g7WUIRp/MEuDxolycaIRNfe0WXgoi5SG8ACOvMtnvZK3HL8Dd2r5gxTdYkiybdc3F3r4CpvgY5idB3Mn//q7j3/v4MN0Z4cT7VjCxxwKf48uZizuUt7PVewX1cBGwcrMG0LPsI17PXTWOZZv8PS/a4/3/DclD37iMLZzWdmDrrvV+NQ9SeP48VEaZXH25UJKFdqXFsJXHhdrl+sMqXuuP/YB4NdRLWuaFQAVX76U0CkMq/s1V45u9RZiwGocD5BxfLq8QXkes03unFgWqnYhJldHh7D91bthHi4BPfI49DtDPZ0b1+tUCyDp7W9dwTVhQ5kQOvsu4uzceVueqrif9Z/VO/xpQuXWXt6+Kja/52HD+xbpZA1xOs1rnvzsVBBJcqBKbHvNPjvup8pychi3//G5cygnQnlFPxWafX3xSYeFMZZcnu9dtsBe4lwnz4TFPV+584EdlIzbU9YPKj1et2LGr7/TnwcgYT+NVOTRY4pY5UXez7OLkAD25TPkusynx/n2XxinvssS/Oy3fti6z/ZHMHXaL8sf05wrAdkbw1e69gEVel19IvQhknBjl1gG75k0zIutBCd4EfX9/5DK/9cqe15H/y25B/t5+AU9CZr91EAOFDv7c4sHKeUMLPjWNcGbK3qD835TNi/mmQptTchrrhCe/th13QMsCQ8h5qtwhkGsv89bu2+8AFVuGuZq1RvlXArroBibc8eIDEbZBuBmWSoqrFZuCQKvZ89WE8zWbYZwKMHt8fDP+b/Ly9eI+3gv/F13tEcw/KBYjw8fqSO7v8FBN1WKBQMIMoQA8UIHBT7O6MrfldVkEbCKgPSd2bx5/O2pH67E6Qovt3uz9fGDL8Kz9wCLAVPqLOU682f4indMMaGsU/9Y2s92scolHL7dpDx+iAwBHfUYAyFsPsksai9ILSWmbIgLMsrquk/F8NCFaWjNTY2CRvLuwHcrp4LcaLNjYuUc6hLviuj043eaS4sSR6w0m/HbXlqIK6i8FwhZdvMCW/yW4uhCkmO+sAFCE/Cx8ePK3UjZQNyby7AVAPU30tYLk/+y47HPX3JIBDYrG7tCj+AJXJsgkeiLUKgAAAAAAA', $description = '', $characteristics = '')
	{
		$this->name = $name;
		$this->price = $price;
		$this->image = $image;
		$this->description = $description;
		$this->characteristics = $characteristics;
	}

	public function genHtml()
	{
		?>
	  <div class="products-item">
		  <img src="<?= $this->image ?>" alt="<?= $this->name ?>" class="product-item__image">
		  <p class="products-item__price"><?=$this->price?></p>
		  <div class="products-item__caption">
			  <p class="products-item__title"><?= $this->name ?></p>
			  <div class="products-item__description"><?= $this->description ?></div>
		  </div>
		  <button class="products-item__buy">Купить</button>
	  </div>
	<?php }
}