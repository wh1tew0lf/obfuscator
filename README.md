obfuscator
==========
This is php obfuscator. Very simply, but for some purposes it will works.
It will works thanks to PHP-Parser class (Project).
Link to PHP-Parser https://github.com/nikic/PHP-Parser

Usage:
<pre><code>
obfuscator::clearState();
obfuscator::loadCode(file_get_contents(/*Some file path*/) /*Or string*/);
obfuscator::anylize();
obfuscator::obfuscate();
file_put_contents(/*Some file path*/, obfuscator::save());
</code></pre>

