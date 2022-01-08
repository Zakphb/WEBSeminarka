<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf7934d7bc9f168461b53a3044694792a
{
    public static $files = array (
        'd507e002f7fce7f0c6dbf1f22edcb902' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/functions.php',
    );

    public static $classMap = array (
        'App\\Controllers\\BaseController' => __DIR__ . '/../..' . '/src/Controllers/BaseController.php',
        'App\\Controllers\\HobbyGroupController' => __DIR__ . '/../..' . '/src/Controllers/HobbyGroupController.php',
        'App\\Controllers\\HomeController' => __DIR__ . '/../..' . '/src/Controllers/HomeController.php',
        'App\\Controllers\\IController' => __DIR__ . '/../..' . '/src/Controllers/IController.php',
        'App\\Controllers\\LoginController' => __DIR__ . '/../..' . '/src/Controllers/LoginController.php',
        'App\\Controllers\\PermissionController' => __DIR__ . '/../..' . '/src/Controllers/PermissionController.php',
        'App\\Controllers\\RoleController' => __DIR__ . '/../..' . '/src/Controllers/RoleController.php',
        'App\\Controllers\\ScheduleController' => __DIR__ . '/../..' . '/src/Controllers/ScheduleController.php',
        'App\\Controllers\\SchoolroomController' => __DIR__ . '/../..' . '/src/Controllers/SchoolroomController.php',
        'App\\Controllers\\UserController' => __DIR__ . '/../..' . '/src/Controllers/UserController.php',
        'App\\Core\\Application' => __DIR__ . '/../..' . '/src/Core/Application.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/src/Core/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/src/Core/Router.php',
        'App\\Entities\\Database\\Decomp\\BaseDecompEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Decomp/BaseDecompEntity.php',
        'App\\Entities\\Database\\Decomp\\RoleToPermissionDecompEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Decomp/RoleToPermissionDecompEntity.php',
        'App\\Entities\\Database\\Decomp\\UserToHobbyGroupDecompEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Decomp/UserToHobbyGroupDecompEntity.php',
        'App\\Entities\\Database\\Decomp\\UserToRoleDecompEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Decomp/UserToRoleDecompEntity.php',
        'App\\Entities\\Database\\Decomp\\UserToScheduleDecompEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Decomp/UserToScheduleDecompEntity.php',
        'App\\Entities\\Database\\Object\\BaseObjectEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Object/BaseObjectEntity.php',
        'App\\Entities\\Database\\Object\\HobbyGroupObjectEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Object/HobbyGroupObjectEntity.php',
        'App\\Entities\\Database\\Object\\PermissionObjectEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Object/PermissionObjectEntity.php',
        'App\\Entities\\Database\\Object\\RoleObjectEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Object/RoleObjectEntity.php',
        'App\\Entities\\Database\\Object\\ScheduleObjectEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Object/ScheduleObjectEntity.php',
        'App\\Entities\\Database\\Object\\SchoolroomObjectEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Object/SchoolroomObjectEntity.php',
        'App\\Entities\\Database\\Object\\SchoolroomTypeObjectEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Object/SchoolroomTypeObjectEntity.php',
        'App\\Entities\\Database\\Object\\UserObjectEntity' => __DIR__ . '/../..' . '/src/Entities/Database/Object/UserObjectEntity.php',
        'App\\Entities\\Full\\BaseFullEntity' => __DIR__ . '/../..' . '/src/Entities/Full/BaseFullEntity.php',
        'App\\Entities\\Full\\HobbyGroupFullEntity' => __DIR__ . '/../..' . '/src/Entities/Full/HobbyGroupFullEntity.php',
        'App\\Entities\\Full\\RoleFullEntity' => __DIR__ . '/../..' . '/src/Entities/Full/RoleFullEntity.php',
        'App\\Entities\\Full\\ScheduleFullEntity' => __DIR__ . '/../..' . '/src/Entities/Full/ScheduleFullEntity.php',
        'App\\Entities\\Full\\UserFullEntity' => __DIR__ . '/../..' . '/src/Entities/Full/UserFullEntity.php',
        'App\\Enums\\ActionConstructors\\EBaseActionConstructor' => __DIR__ . '/../..' . '/src/Enums/ActionConstructors/EBaseActionConstructor.php',
        'App\\Enums\\ActionConstructors\\EHobbyGroupConstructor' => __DIR__ . '/../..' . '/src/Enums/ActionConstructors/EHobbyGroupConstructor.php',
        'App\\Enums\\ActionConstructors\\EHomeConstructor' => __DIR__ . '/../..' . '/src/Enums/ActionConstructors/EHomeConstructor.php',
        'App\\Enums\\ActionConstructors\\ELoginConstructor' => __DIR__ . '/../..' . '/src/Enums/ActionConstructors/ELoginConstructor.php',
        'App\\Enums\\ActionConstructors\\EPermissionConstructor' => __DIR__ . '/../..' . '/src/Enums/ActionConstructors/EPermissionConstructor.php',
        'App\\Enums\\ActionConstructors\\ERoleConstructor' => __DIR__ . '/../..' . '/src/Enums/ActionConstructors/ERoleConstructor.php',
        'App\\Enums\\ActionConstructors\\EScheduleConstructor' => __DIR__ . '/../..' . '/src/Enums/ActionConstructors/EScheduleConstructor.php',
        'App\\Enums\\ActionConstructors\\ESchoolroomConstructor' => __DIR__ . '/../..' . '/src/Enums/ActionConstructors/ESchoolroomConstructor.php',
        'App\\Enums\\ActionConstructors\\EUserConstructor' => __DIR__ . '/../..' . '/src/Enums/ActionConstructors/EUserConstructor.php',
        'App\\Enums\\EControllerNames' => __DIR__ . '/../..' . '/src/Enums/EControllerNames.php',
        'App\\Models\\Database\\BaseDatabase' => __DIR__ . '/../..' . '/src/Models/Database/BaseDatabase.php',
        'App\\Models\\Database\\HobbyGroupDatabase' => __DIR__ . '/../..' . '/src/Models/Database/HobbyGroupDatabase.php',
        'App\\Models\\Database\\PermissionDatabase' => __DIR__ . '/../..' . '/src/Models/Database/PermissionDatabase.php',
        'App\\Models\\Database\\RoleDatabase' => __DIR__ . '/../..' . '/src/Models/Database/RoleDatabase.php',
        'App\\Models\\Database\\RoleToPermissionDatabase' => __DIR__ . '/../..' . '/src/Models/Database/RoleToPermissionDatabase.php',
        'App\\Models\\Database\\ScheduleDatabase' => __DIR__ . '/../..' . '/src/Models/Database/ScheduleDatabase.php',
        'App\\Models\\Database\\SchoolroomDatabase' => __DIR__ . '/../..' . '/src/Models/Database/SchoolroomDatabase.php',
        'App\\Models\\Database\\SchoolroomTypeDatabase' => __DIR__ . '/../..' . '/src/Models/Database/SchoolroomTypeDatabase.php',
        'App\\Models\\Database\\UserDatabase' => __DIR__ . '/../..' . '/src/Models/Database/UserDatabase.php',
        'App\\Models\\Database\\UserToHobbyGroupDatabase' => __DIR__ . '/../..' . '/src/Models/Database/UserToHobbyGroupDatabase.php',
        'App\\Models\\Database\\UserToRoleDatabase' => __DIR__ . '/../..' . '/src/Models/Database/UserToRoleDatabase.php',
        'App\\Models\\Database\\UserToScheduleDatabase' => __DIR__ . '/../..' . '/src/Models/Database/UserToScheduleDatabase.php',
        'App\\Models\\Facade\\HobbyGroupFacade' => __DIR__ . '/../..' . '/src/Models/Facade/HobbyGroupFacade.php',
        'App\\Models\\Facade\\PermissionFacade' => __DIR__ . '/../..' . '/src/Models/Facade/PermissionFacade.php',
        'App\\Models\\Facade\\RoleFacade' => __DIR__ . '/../..' . '/src/Models/Facade/RoleFacade.php',
        'App\\Models\\Facade\\ScheduleFacade' => __DIR__ . '/../..' . '/src/Models/Facade/ScheduleFacade.php',
        'App\\Models\\Facade\\SchoolroomFacade' => __DIR__ . '/../..' . '/src/Models/Facade/SchoolroomFacade.php',
        'App\\Models\\Facade\\UserFacade' => __DIR__ . '/../..' . '/src/Models/Facade/UserFacade.php',
        'App\\Utilities\\ArrayUtils' => __DIR__ . '/../..' . '/src/Utilities/ArrayUtils.php',
        'App\\Utilities\\DateTimeUtility' => __DIR__ . '/../..' . '/src/Utilities/DateTimeUtility.php',
        'App\\Utilities\\Login' => __DIR__ . '/../..' . '/src/Utilities/Login.php',
        'App\\Utilities\\RedirectUtils' => __DIR__ . '/../..' . '/src/Utilities/RedirectUtils.php',
        'App\\Utilities\\Response' => __DIR__ . '/../..' . '/src/Utilities/Response.php',
        'App\\Utilities\\Sessions' => __DIR__ . '/../..' . '/src/Utilities/Sessions.php',
        'App\\Utilities\\StringUtils' => __DIR__ . '/../..' . '/src/Utilities/StringUtils.php',
        'App\\Utilities\\UploadUtils' => __DIR__ . '/../..' . '/src/Utilities/UploadUtils.php',
        'ChildClass' => __DIR__ . '/..' . '/tracy/tracy/examples/dump.php',
        'ComposerAutoloaderInitf7934d7bc9f168461b53a3044694792a' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitf7934d7bc9f168461b53a3044694792a' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DemoClass' => __DIR__ . '/..' . '/tracy/tracy/examples/exception.php',
        'Latte\\Attributes\\TemplateFilter' => __DIR__ . '/..' . '/latte/latte/src/Latte/attributes.php',
        'Latte\\Attributes\\TemplateFunction' => __DIR__ . '/..' . '/latte/latte/src/Latte/attributes.php',
        'Latte\\Bridges\\Tracy\\BlueScreenPanel' => __DIR__ . '/..' . '/latte/latte/src/Bridges/Tracy/BlueScreenPanel.php',
        'Latte\\Bridges\\Tracy\\LattePanel' => __DIR__ . '/..' . '/latte/latte/src/Bridges/Tracy/LattePanel.php',
        'Latte\\CompileException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\Compiler' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Compiler.php',
        'Latte\\Engine' => __DIR__ . '/..' . '/latte/latte/src/Latte/Engine.php',
        'Latte\\Helpers' => __DIR__ . '/..' . '/latte/latte/src/Latte/Helpers.php',
        'Latte\\HtmlNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/HtmlNode.php',
        'Latte\\ILoader' => __DIR__ . '/..' . '/latte/latte/src/compatibility.php',
        'Latte\\IMacro' => __DIR__ . '/..' . '/latte/latte/src/compatibility.php',
        'Latte\\Loader' => __DIR__ . '/..' . '/latte/latte/src/Latte/Loader.php',
        'Latte\\Loaders\\FileLoader' => __DIR__ . '/..' . '/latte/latte/src/Latte/Loaders/FileLoader.php',
        'Latte\\Loaders\\StringLoader' => __DIR__ . '/..' . '/latte/latte/src/Latte/Loaders/StringLoader.php',
        'Latte\\Macro' => __DIR__ . '/..' . '/latte/latte/src/Latte/Macro.php',
        'Latte\\MacroNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/MacroNode.php',
        'Latte\\MacroTokens' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/MacroTokens.php',
        'Latte\\Macros\\BlockMacros' => __DIR__ . '/..' . '/latte/latte/src/Latte/Macros/BlockMacros.php',
        'Latte\\Macros\\CoreMacros' => __DIR__ . '/..' . '/latte/latte/src/Latte/Macros/CoreMacros.php',
        'Latte\\Macros\\MacroSet' => __DIR__ . '/..' . '/latte/latte/src/Latte/Macros/MacroSet.php',
        'Latte\\Parser' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Parser.php',
        'Latte\\PhpHelpers' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/PhpHelpers.php',
        'Latte\\PhpWriter' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/PhpWriter.php',
        'Latte\\Policy' => __DIR__ . '/..' . '/latte/latte/src/Latte/Policy.php',
        'Latte\\RegexpException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\RuntimeException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\Runtime\\Block' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Block.php',
        'Latte\\Runtime\\Blueprint' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Blueprint.php',
        'Latte\\Runtime\\CachingIterator' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/CachingIterator.php',
        'Latte\\Runtime\\Defaults' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Defaults.php',
        'Latte\\Runtime\\FilterExecutor' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/FilterExecutor.php',
        'Latte\\Runtime\\FilterInfo' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/FilterInfo.php',
        'Latte\\Runtime\\Filters' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Filters.php',
        'Latte\\Runtime\\Html' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Html.php',
        'Latte\\Runtime\\HtmlStringable' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/HtmlStringable.php',
        'Latte\\Runtime\\IHtmlString' => __DIR__ . '/..' . '/latte/latte/src/compatibility.php',
        'Latte\\Runtime\\ISnippetBridge' => __DIR__ . '/..' . '/latte/latte/src/compatibility.php',
        'Latte\\Runtime\\RollbackException' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/RollbackException.php',
        'Latte\\Runtime\\SnippetBridge' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/SnippetBridge.php',
        'Latte\\Runtime\\SnippetDriver' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/SnippetDriver.php',
        'Latte\\Runtime\\Template' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Template.php',
        'Latte\\Runtime\\Tracer' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Tracer.php',
        'Latte\\Sandbox\\SecurityPolicy' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/SecurityPolicy.php',
        'Latte\\SecurityViolationException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\Strict' => __DIR__ . '/..' . '/latte/latte/src/Latte/Strict.php',
        'Latte\\Token' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Token.php',
        'Latte\\TokenIterator' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/TokenIterator.php',
        'Latte\\Tokenizer' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Tokenizer.php',
        'ParentClass' => __DIR__ . '/..' . '/tracy/tracy/examples/dump.php',
        'Test' => __DIR__ . '/..' . '/tracy/tracy/examples/dump-snapshot.php',
        'Tracy\\Bar' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Bar/Bar.php',
        'Tracy\\BlueScreen' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/BlueScreen/BlueScreen.php',
        'Tracy\\Bridges\\Nette\\Bridge' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Nette/Bridge.php',
        'Tracy\\Bridges\\Nette\\MailSender' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Nette/MailSender.php',
        'Tracy\\Bridges\\Nette\\TracyExtension' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Nette/TracyExtension.php',
        'Tracy\\Bridges\\Psr\\PsrToTracyLoggerAdapter' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Psr/PsrToTracyLoggerAdapter.php',
        'Tracy\\Bridges\\Psr\\TracyToPsrLoggerAdapter' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Psr/TracyToPsrLoggerAdapter.php',
        'Tracy\\Debugger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Debugger/Debugger.php',
        'Tracy\\DefaultBarPanel' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Bar/DefaultBarPanel.php',
        'Tracy\\Dumper' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Dumper/Dumper.php',
        'Tracy\\Dumper\\Describer' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Dumper/Describer.php',
        'Tracy\\Dumper\\Exposer' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Dumper/Exposer.php',
        'Tracy\\Dumper\\Renderer' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Dumper/Renderer.php',
        'Tracy\\Dumper\\Value' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Dumper/Value.php',
        'Tracy\\FireLogger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Logger/FireLogger.php',
        'Tracy\\Helpers' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Helpers.php',
        'Tracy\\IBarPanel' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Bar/IBarPanel.php',
        'Tracy\\ILogger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Logger/ILogger.php',
        'Tracy\\Logger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Logger/Logger.php',
        'Tracy\\OutputDebugger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/OutputDebugger/OutputDebugger.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitf7934d7bc9f168461b53a3044694792a::$classMap;

        }, null, ClassLoader::class);
    }
}
