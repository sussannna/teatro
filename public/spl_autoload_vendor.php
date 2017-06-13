<?php
/**
 * An example of a project-specific implementation.
 *
 * After registering this autoload function with SPL, the following line
 * would cause the function to attempt to load the \Foo\Bar\Baz\Qux class
 * from /path/to/project/src/Baz/Qux.php:
 *
 *      new \Foo\Bar\Baz\Qux;
 *
 * @param string $class The fully-qualified class name.
 * @return void
 */
spl_autoload_register(function ($class) {

  // $class = "Cervezza\Utils\FrontControllerView";
  // echo "<pre>try vendor: ";
  // print_r($class);
  // echo "</pre>";

    // project-specific namespace prefix
    $prefix = 'Cervezza\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/../vendor/cervezza/src/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        echo("DEAD VENDOR");
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    // $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    $file = $base_dir .str_replace('\\', '/', $relative_class) . '.php';


    // echo "<pre>file:";
    // print_r($file);
    // echo "</pre>";


    // if the file exists, require it
    if (file_exists($file)) {
      // echo "Loading Vendor: ".$file."</br>";
      // die;
        require $file;
    }
});
