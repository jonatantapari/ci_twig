CI TWIG
=======

You can integrate the template engine TWIG with CodeIgniter.

>Clone this repository inside of "_%codeigniter path%/application/libraries_":

```
git clone https://github.com/jonatantapari/ci_twig.git ci_twig
```

>Clone twig repository inside of "_%codeigniter path%/application/libraries/ci_twig_":

```
git clone https://github.com/twigphp/Twig.git twig
```

>Create a twig view in "_%codeigniter path%/application/views/_". For example a create a view named test.html:

```html
<html>
<head>
    <title>Test Twig</title>
</head>
<body>
    {{ msg }}
</body>
</html>
```

>Load twig library. For example create a controller named TestTwig.php:

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TestTwig extends CI_Controller
{
    public function index()
    {
        //Load library
        $this->load->library('ci_twig/twig');

        //Render a view
        echo $this->twig->environment->render('test.html',array('msg'=>'Hello world'));
    }
}
?>
```

>If you wish. You can Configurate twig in "_%codeigniter path%/appliaction/config/config.php_":

```php
<?php
//...

$config['twig_debug']= false;           //boolean. By default: false
$config['twig_charset']='utf-8';        //dtring.  By default: 'utf-8'
$config['twig_auto_reload']=true;       //boolean. By default: true
$config['twig_strict_variables']=true;  //boolean. By default: true
$config['twig_autoescape']=true;        //boolean. By default: true
$config['twig_optimizations']=-1;       //int.     By default: -1
$config['twig_template_path']='views';  //string.  By default: 'views'
$config['twig_cache_path']='cache';     //string.  By default: 'cache'

//...
?>
```

