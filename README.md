obfuscator
==========
This is php obfuscator. Very simply, but for some purposes it will works.
It will works thanks to PHP-Parser class (Project).
Link to PHP-Parser https://github.com/nikic/PHP-Parser

Usage:
<pre><code>
obfuscator::loadCode( /*Some file path*/ );
//or obfuscator::setCode( /*Some code string*/ );
obfuscator::anylize(); //or obfuscator::obfuscate();
obfuscator::saveCode(/*Some file path*/);
//or obfuscator::getCode();
</code></pre>

