<?php
	namespace Foo\Bar\subnamespace;

	const FOO = 1;
	function foo() {}
	class foo {
		static function staticmethod() {}
	}
?>

<?php
	namespace Foo\Bar;
	include 'file.php';

	const FOO = 2;
	function foo() {}
	class foo {
		static function staticmothod() {}
	}

	foo();
	foo::staticmethod();
	echo FOO;
?>
为类名使用别名
为接口使用别名
为命名空间使用别名
<?php
namespace foo;
use My\Full\Classname as Another;

?>
