# [WIP] Contao Entity Attributes Bundle

## Usage:

Tag your entities with `entity.datacontainer`.

### Minimal configuration
```php
use Doctrine\ORM\Mapping as ORM;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute as DCA;

/**
 * @ORM\Entity 
 * @ORM\Table("tl_my_table_name") 
 */
#[ORM\Entity]                    #<-- not supported by Contao yet
#[ORM\Table('tl_my_table_name')] #<-- not supported by Contao yet
#[DCA\DataContainer]
class MyEntity
{

}
```

### Exemplary configuration

```php
use Doctrine\ORM\Mapping as ORM;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute as DCA;

/**
 * @ORM\Entity
 * @ORM\Table('my_entity')  
 */
#[ORM\Entity]             #<-- not supported by Contao yet
#[ORM\Table('my_entity')] #<-- not supported by Contao yet
#[DCA\DataContainer]
#[DCA\Label(fields: ['id', 'tstamp', 'name', 'alias'], showColumns: true)]
#[DCA\Palettes(legends: ['title', 'config', 'custom'])]
#[DCA\GlobalOperationAll]
#[DCA\OperationEdit]
#[DCA\OperationDelete]
#[DCA\OperationShow]
// there are more Attributes available
class MyEntity
{
    #[DCA\Field(exclude: false)]
    private int $id;

    /**
     * @ORM\Column('my_custom_name', nullable=true)  
     */
    #[ORM\Column('my_custom_name', nullable: true)] #<-- not supported by Contao yet
    #[DCA\Field(search: true, sorting: true)]
    #[DCA\Palette('title')]
    // there are more Attributes available
    private string $name;
}
```

## Custom properties
Just type your custom properties as PHP 8 named params.
```php
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute as DCA;

#[DCA\DataContainer(my_custom_key: 'my_custom_value')]
class myEntity
{

}
```

## Good to know

- `Field::$exclude` is default `true`
- `Sorting::$panelLayout` default is `'filter;sort,search,limit'`
- don't use the `$__custom_properties` parameter, just write your [custom properties](#Custom properties).

## To do

- [ ] Write a basic usage documentation.
- [ ] Add helper properties like `w50: true` for fields with most used configurations.
- [ ] Create CompilerPass for `EntityDataContainerInterface` to tag Entities automatically.
- [ ] Refactor the `Palette` and `Palettes` Attribute for better handling. Maybe without MetaPalettes requirement.
- [ ] Configure the field evaluation from Doctrine Mapping like `minLength`, `maxLength` etc.