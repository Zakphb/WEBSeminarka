<?php
namespace App\Utilities;

use App\Models\Database\UserDatabase;
use App\Models\Database\UserToRoleDatabase;
use App\Models\Facade\UserFacade;

/**
 *  Trida pro spravu prihlaseni uzivatele.
 * @author Michal Nykl
 */
class Login
{

	/** @var Sessions $ses Objekt pro praci se session. */
	private $ses;

	private $userFacade;
	// viditelnost konstant od PHP v.7.1  !!!!

	/** @var string SESSION_KEY  Klic pro ulozeni uzivatele do session */
	private const SESSION_KEY = "usr";

	/** @var string KEY_NAME  Klic pro ulozeni jmena do pole. */
	private const KEY_ID = "id";
	/** @var string KEY_DATE  Klic pro ulozeni datumu do pole. */
	private const KEY_DATE = "date";

	/**
	 *  Pri vytvoreni objektu zahajim session.
	 */
	public function __construct()
	{
		// vytvorim instanci vlastni tridy pro praci se session (objekt)
		$this->ses = new Sessions();
		$this->userFacade = new UserFacade(new UserDatabase(), new UserToRoleDatabase());
	}

	/**
	 *  Otestuje, zda je uzivatel prihlasen.
	 * @return bool
	 */
	public function isUserLogged(): bool
	{
		return $this->ses->isSessionSet(self::SESSION_KEY);
	}

	/**
	 *  Nastavi do session jmeno uzivatele a datum prihlaseni.
	 * @param string $userName Jmeno uzivatele.
	 */
	public function login(string $id)
	{
		$data = [self::KEY_ID => $id,
			self::KEY_DATE => date("d. m. Y, G:i:s")];
		$this->ses->setSession(self::SESSION_KEY, $data);
	}

	/**
	 *  Odhlasi uzivatele.
	 */
	public function logout()
	{
		$this->ses->removeSession(self::SESSION_KEY);
	}

	/**
	 *  Vrati informace o uzivateli.
	 * @return string|null  Informace o uzivateli.
	 */
	public function getUserInfo(): ?array
	{
		if (!$this->isUserLogged())
		{
			return null;
		}
		$userInfo = $this->ses->readSession(self::SESSION_KEY);
		return $this->userFacade->getFullUser($userInfo[self::KEY_ID]);
	}

}

?>
