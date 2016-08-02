# obfuscator
This is php obfuscator. Very simply, but for some purposes it will works.
It will works thanks to PHP-Parser class (Project).
Link to PHP-Parser https://github.com/nikic/PHP-Parser

Usage:
```
obfuscator::loadCode( /*Some file path*/ );
//or obfuscator::setCode( /*Some code string*/ );
obfuscator::anylize(); //or obfuscator::obfuscate();
obfuscator::saveCode(/*Some file path*/);
//or obfuscator::getCode();
```

TODO:
1. Minification
2. Base64 encoding
3. GZip
4. Eval
5. Obfuscate folder
6. Test on WordPress plugins
