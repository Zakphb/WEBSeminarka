<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'App\\Controllers\\BaseController' => $baseDir . '/src/Controllers/BaseController.php',
    'App\\Controllers\\HobbyGroupController' => $baseDir . '/src/Controllers/HobbyGroupController.php',
    'App\\Controllers\\HomeController' => $baseDir . '/src/Controllers/HomeController.php',
    'App\\Controllers\\IController' => $baseDir . '/src/Controllers/IController.php',
    'App\\Controllers\\LoginController' => $baseDir . '/src/Controllers/LoginController.php',
    'App\\Controllers\\SchoolroomController' => $baseDir . '/src/Controllers/SchoolroomController.php',
    'App\\Controllers\\UserController' => $baseDir . '/src/Controllers/UserController.php',
    'App\\Core\\Application' => $baseDir . '/src/Core/Application.php',
    'App\\Core\\Request' => $baseDir . '/src/Core/Request.php',
    'App\\Core\\Router' => $baseDir . '/src/Core/Router.php',
    'App\\Entities\\Database\\Decomp\\BaseDecompEntity' => $baseDir . '/src/Entities/Database/Decomp/BaseDecompEntity.php',
    'App\\Entities\\Database\\Decomp\\RoleToPermissionDecompEntity' => $baseDir . '/src/Entities/Database/Decomp/RoleToPermissionDecompEntity.php',
    'App\\Entities\\Database\\Decomp\\UserToRoleDecompEntity' => $baseDir . '/src/Entities/Database/Decomp/UserToRoleDecompEntity.php',
    'App\\Entities\\Database\\Decomp\\UserToScheduleDecompEntity' => $baseDir . '/src/Entities/Database/Decomp/UserToScheduleDecompEntity.php',
    'App\\Entities\\Database\\Object\\BaseObjectEntity' => $baseDir . '/src/Entities/Database/Object/BaseObjectEntity.php',
    'App\\Entities\\Database\\Object\\HobbyGroupObjectEntity' => $baseDir . '/src/Entities/Database/Object/HobbyGroupObjectEntity.php',
    'App\\Entities\\Database\\Object\\PermissionObjectEntity' => $baseDir . '/src/Entities/Database/Object/PermissionObjectEntity.php',
    'App\\Entities\\Database\\Object\\RoleObjectEntity' => $baseDir . '/src/Entities/Database/Object/RoleObjectEntity.php',
    'App\\Entities\\Database\\Object\\ScheduleObjectEntity' => $baseDir . '/src/Entities/Database/Object/ScheduleObjectEntity.php',
    'App\\Entities\\Database\\Object\\SchoolroomObjectEntity' => $baseDir . '/src/Entities/Database/Object/SchoolroomObjectEntity.php',
    'App\\Entities\\Database\\Object\\UserObjectEntity' => $baseDir . '/src/Entities/Database/Object/UserObjectEntity.php',
    'App\\Entities\\Full\\BaseFullEntity' => $baseDir . '/src/Entities/Full/BaseFullEntity.php',
    'App\\Entities\\Full\\UserFullEntity' => $baseDir . '/src/Entities/Full/UserFullEntity.php',
    'App\\Enums\\EBaseActionNames' => $baseDir . '/src/Enums/EBaseActionNames.php',
    'App\\Enums\\EHobbyGroupActions' => $baseDir . '/src/Enums/EHobbyGroupActions.php',
    'App\\Enums\\ESchoolroomActions' => $baseDir . '/src/Enums/ESchoolroomActions.php',
    'App\\Models\\Database\\BaseDatabase' => $baseDir . '/src/Models/Database/BaseDatabase.php',
    'App\\Models\\Database\\HobbyGroupDatabase' => $baseDir . '/src/Models/Database/HobbyGroupDatabase.php',
    'App\\Models\\Database\\PermissionDatabase' => $baseDir . '/src/Models/Database/PermissionDatabase.php',
    'App\\Models\\Database\\RoleDatabase' => $baseDir . '/src/Models/Database/RoleDatabase.php',
    'App\\Models\\Database\\ScheduleDatabase' => $baseDir . '/src/Models/Database/ScheduleDatabase.php',
    'App\\Models\\Database\\SchoolroomDatabase' => $baseDir . '/src/Models/Database/SchoolroomDatabase.php',
    'App\\Models\\Database\\UserDatabase' => $baseDir . '/src/Models/Database/UserDatabase.php',
    'App\\Models\\Database\\UserToRoleDatabase' => $baseDir . '/src/Models/Database/UserToRoleDatabase.php',
    'App\\Models\\Facade\\HobbyGroupFacade' => $baseDir . '/src/Models/Facade/HobbyGroupFacade.php',
    'App\\Models\\Facade\\SchoolroomFacade' => $baseDir . '/src/Models/Facade/SchoolroomFacade.php',
    'App\\Models\\Facade\\UserFacade' => $baseDir . '/src/Models/Facade/UserFacade.php',
    'App\\Utilities\\ArrayUtils' => $baseDir . '/src/Utilities/ArrayUtils.php',
    'App\\Utilities\\Login' => $baseDir . '/src/Utilities/Login.php',
    'App\\Utilities\\RedirectUtils' => $baseDir . '/src/Utilities/RedirectUtils.php',
    'App\\Utilities\\Response' => $baseDir . '/src/Utilities/Response.php',
    'App\\Utilities\\Sessions' => $baseDir . '/src/Utilities/Sessions.php',
    'App\\Utilities\\StringUtils' => $baseDir . '/src/Utilities/StringUtils.php',
    'ChildClass' => $vendorDir . '/tracy/tracy/examples/dump.php',
    'ComposerAutoloaderInitf7934d7bc9f168461b53a3044694792a' => $vendorDir . '/composer/autoload_real.php',
    'Composer\\Autoload\\ClassLoader' => $vendorDir . '/composer/ClassLoader.php',
    'Composer\\Autoload\\ComposerStaticInitf7934d7bc9f168461b53a3044694792a' => $vendorDir . '/composer/autoload_static.php',
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'DemoClass' => $vendorDir . '/tracy/tracy/examples/exception.php',
    'Latte\\Attributes\\TemplateFilter' => $vendorDir . '/latte/latte/src/Latte/attributes.php',
    'Latte\\Attributes\\TemplateFunction' => $vendorDir . '/latte/latte/src/Latte/attributes.php',
    'Latte\\Bridges\\Tracy\\BlueScreenPanel' => $vendorDir . '/latte/latte/src/Bridges/Tracy/BlueScreenPanel.php',
    'Latte\\Bridges\\Tracy\\LattePanel' => $vendorDir . '/latte/latte/src/Bridges/Tracy/LattePanel.php',
    'Latte\\CompileException' => $vendorDir . '/latte/latte/src/Latte/exceptions.php',
    'Latte\\Compiler' => $vendorDir . '/latte/latte/src/Latte/Compiler/Compiler.php',
    'Latte\\Engine' => $vendorDir . '/latte/latte/src/Latte/Engine.php',
    'Latte\\Helpers' => $vendorDir . '/latte/latte/src/Latte/Helpers.php',
    'Latte\\HtmlNode' => $vendorDir . '/latte/latte/src/Latte/Compiler/HtmlNode.php',
    'Latte\\ILoader' => $vendorDir . '/latte/latte/src/compatibility.php',
    'Latte\\IMacro' => $vendorDir . '/latte/latte/src/compatibility.php',
    'Latte\\Loader' => $vendorDir . '/latte/latte/src/Latte/Loader.php',
    'Latte\\Loaders\\FileLoader' => $vendorDir . '/latte/latte/src/Latte/Loaders/FileLoader.php',
    'Latte\\Loaders\\StringLoader' => $vendorDir . '/latte/latte/src/Latte/Loaders/StringLoader.php',
    'Latte\\Macro' => $vendorDir . '/latte/latte/src/Latte/Macro.php',
    'Latte\\MacroNode' => $vendorDir . '/latte/latte/src/Latte/Compiler/MacroNode.php',
    'Latte\\MacroTokens' => $vendorDir . '/latte/latte/src/Latte/Compiler/MacroTokens.php',
    'Latte\\Macros\\BlockMacros' => $vendorDir . '/latte/latte/src/Latte/Macros/BlockMacros.php',
    'Latte\\Macros\\CoreMacros' => $vendorDir . '/latte/latte/src/Latte/Macros/CoreMacros.php',
    'Latte\\Macros\\MacroSet' => $vendorDir . '/latte/latte/src/Latte/Macros/MacroSet.php',
    'Latte\\Parser' => $vendorDir . '/latte/latte/src/Latte/Compiler/Parser.php',
    'Latte\\PhpHelpers' => $vendorDir . '/latte/latte/src/Latte/Compiler/PhpHelpers.php',
    'Latte\\PhpWriter' => $vendorDir . '/latte/latte/src/Latte/Compiler/PhpWriter.php',
    'Latte\\Policy' => $vendorDir . '/latte/latte/src/Latte/Policy.php',
    'Latte\\RegexpException' => $vendorDir . '/latte/latte/src/Latte/exceptions.php',
    'Latte\\RuntimeException' => $vendorDir . '/latte/latte/src/Latte/exceptions.php',
    'Latte\\Runtime\\Block' => $vendorDir . '/latte/latte/src/Latte/Runtime/Block.php',
    'Latte\\Runtime\\Blueprint' => $vendorDir . '/latte/latte/src/Latte/Runtime/Blueprint.php',
    'Latte\\Runtime\\CachingIterator' => $vendorDir . '/latte/latte/src/Latte/Runtime/CachingIterator.php',
    'Latte\\Runtime\\Defaults' => $vendorDir . '/latte/latte/src/Latte/Runtime/Defaults.php',
    'Latte\\Runtime\\FilterExecutor' => $vendorDir . '/latte/latte/src/Latte/Runtime/FilterExecutor.php',
    'Latte\\Runtime\\FilterInfo' => $vendorDir . '/latte/latte/src/Latte/Runtime/FilterInfo.php',
    'Latte\\Runtime\\Filters' => $vendorDir . '/latte/latte/src/Latte/Runtime/Filters.php',
    'Latte\\Runtime\\Html' => $vendorDir . '/latte/latte/src/Latte/Runtime/Html.php',
    'Latte\\Runtime\\HtmlStringable' => $vendorDir . '/latte/latte/src/Latte/Runtime/HtmlStringable.php',
    'Latte\\Runtime\\IHtmlString' => $vendorDir . '/latte/latte/src/compatibility.php',
    'Latte\\Runtime\\ISnippetBridge' => $vendorDir . '/latte/latte/src/compatibility.php',
    'Latte\\Runtime\\RollbackException' => $vendorDir . '/latte/latte/src/Latte/Runtime/RollbackException.php',
    'Latte\\Runtime\\SnippetBridge' => $vendorDir . '/latte/latte/src/Latte/Runtime/SnippetBridge.php',
    'Latte\\Runtime\\SnippetDriver' => $vendorDir . '/latte/latte/src/Latte/Runtime/SnippetDriver.php',
    'Latte\\Runtime\\Template' => $vendorDir . '/latte/latte/src/Latte/Runtime/Template.php',
    'Latte\\Runtime\\Tracer' => $vendorDir . '/latte/latte/src/Latte/Runtime/Tracer.php',
    'Latte\\Sandbox\\SecurityPolicy' => $vendorDir . '/latte/latte/src/Latte/Sandbox/SecurityPolicy.php',
    'Latte\\SecurityViolationException' => $vendorDir . '/latte/latte/src/Latte/exceptions.php',
    'Latte\\Strict' => $vendorDir . '/latte/latte/src/Latte/Strict.php',
    'Latte\\Token' => $vendorDir . '/latte/latte/src/Latte/Compiler/Token.php',
    'Latte\\TokenIterator' => $vendorDir . '/latte/latte/src/Latte/Compiler/TokenIterator.php',
    'Latte\\Tokenizer' => $vendorDir . '/latte/latte/src/Latte/Compiler/Tokenizer.php',
    'ParentClass' => $vendorDir . '/tracy/tracy/examples/dump.php',
    'Test' => $vendorDir . '/tracy/tracy/examples/dump-snapshot.php',
    'Tracy\\Bar' => $vendorDir . '/tracy/tracy/src/Tracy/Bar/Bar.php',
    'Tracy\\BlueScreen' => $vendorDir . '/tracy/tracy/src/Tracy/BlueScreen/BlueScreen.php',
    'Tracy\\Bridges\\Nette\\Bridge' => $vendorDir . '/tracy/tracy/src/Bridges/Nette/Bridge.php',
    'Tracy\\Bridges\\Nette\\MailSender' => $vendorDir . '/tracy/tracy/src/Bridges/Nette/MailSender.php',
    'Tracy\\Bridges\\Nette\\TracyExtension' => $vendorDir . '/tracy/tracy/src/Bridges/Nette/TracyExtension.php',
    'Tracy\\Bridges\\Psr\\PsrToTracyLoggerAdapter' => $vendorDir . '/tracy/tracy/src/Bridges/Psr/PsrToTracyLoggerAdapter.php',
    'Tracy\\Bridges\\Psr\\TracyToPsrLoggerAdapter' => $vendorDir . '/tracy/tracy/src/Bridges/Psr/TracyToPsrLoggerAdapter.php',
    'Tracy\\Debugger' => $vendorDir . '/tracy/tracy/src/Tracy/Debugger/Debugger.php',
    'Tracy\\DefaultBarPanel' => $vendorDir . '/tracy/tracy/src/Tracy/Bar/DefaultBarPanel.php',
    'Tracy\\Dumper' => $vendorDir . '/tracy/tracy/src/Tracy/Dumper/Dumper.php',
    'Tracy\\Dumper\\Describer' => $vendorDir . '/tracy/tracy/src/Tracy/Dumper/Describer.php',
    'Tracy\\Dumper\\Exposer' => $vendorDir . '/tracy/tracy/src/Tracy/Dumper/Exposer.php',
    'Tracy\\Dumper\\Renderer' => $vendorDir . '/tracy/tracy/src/Tracy/Dumper/Renderer.php',
    'Tracy\\Dumper\\Value' => $vendorDir . '/tracy/tracy/src/Tracy/Dumper/Value.php',
    'Tracy\\FireLogger' => $vendorDir . '/tracy/tracy/src/Tracy/Logger/FireLogger.php',
    'Tracy\\Helpers' => $vendorDir . '/tracy/tracy/src/Tracy/Helpers.php',
    'Tracy\\IBarPanel' => $vendorDir . '/tracy/tracy/src/Tracy/Bar/IBarPanel.php',
    'Tracy\\ILogger' => $vendorDir . '/tracy/tracy/src/Tracy/Logger/ILogger.php',
    'Tracy\\Logger' => $vendorDir . '/tracy/tracy/src/Tracy/Logger/Logger.php',
    'Tracy\\OutputDebugger' => $vendorDir . '/tracy/tracy/src/Tracy/OutputDebugger/OutputDebugger.php',
);
