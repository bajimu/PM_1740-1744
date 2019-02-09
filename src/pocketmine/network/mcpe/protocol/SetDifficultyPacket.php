<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\network\mcpe\protocol;

use pocketmine\utils\Binary;


use pocketmine\network\mcpe\NetworkSession;

class SetDifficultyPacket extends DataPacket{
	public const NETWORK_ID = ProtocolInfo::SET_DIFFICULTY_PACKET;

	/** @var int */
	public $difficulty;

	protected function decodePayload(){
		$this->difficulty = $this->getUnsignedVarInt();
	}

	protected function encodePayload(){
		$this->putUnsignedVarInt($this->difficulty);
	}

	public function handle(NetworkSession $session) : bool{
		return $session->handleSetDifficulty($this);
	}
}
