<?php
#region usings
namespace de\fburghardt\Library\Enum;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2023/06/22
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
interface IEnumBase
{
	/**
	 * Finds and returns the Enum object with the given keyword.
	 * @param string $keyword The keyword to search for Enum.
	 * @return self|null The found Enum object or null if not found.
	 * @copyright Implementation:
	 * - public static function case(string $keyword): self|null
	 * - { 
	 * - - foreach (self::cases() as $item)
	 * - - { 
	 * - - - if($item->name === $keyword) { return $item; }
	 * - - }
	 * - - return null;
	 * - }
	 */
	public static function case(string $keyword): self|null;

	// Enum default Methods:

	// EnumTypeName::EnumField Return object
	// EnumTypeName::EnumField->name Return identifier (string)
	// EnumTypeName::EnumField->value Return value (string|int)
	// EnumTypeName::EnumField->cases() Itterate over all EnumFields
	// EnumTypeName::EnumField::from(string|int $value) Return EnumField case from value or ValueError
	// EnumTypeName::EnumField::tryFrom(string|int $value) Return EnumField case from value or null
}
?>