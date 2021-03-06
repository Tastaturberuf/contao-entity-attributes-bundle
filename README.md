# [WIP] Contao Entity Attributes Bundle

## Usage:

Set the mapping type to `attribute` and define where your entities are.
```yaml
# config/services.yaml

doctrine:
    orm:
        mappings:
            App:
                type: attribute
                dir: '%kernel.project_dir%/src/Entity'
                prefix: 'App\Entity'
```

Tag your entities with `entity.datacontainer`.
```yaml
# config/services.yaml

App\Entity\:
    resource: '../src/Entity/'
    tags: ['entity.datacontainer']
```

### Minimal configuration

```php
use Doctrine\ORM\Mapping as ORM;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute as DCA;

#[ORM\Entity]
#[ORM\Table('tl_my_table_name')]
#[DCA\DataContainer]
class MyEntity
{

}
```

### Exemplary configuration

```php
use Doctrine\ORM\Mapping as ORM;
use Tastaturberuf\ContaoEntityAttributesBundle\Attribute as DCA;

#[ORM\Entity]         
#[ORM\Table('my_entity')]
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

    #[ORM\Column('my_custom_name', nullable: true)]
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
