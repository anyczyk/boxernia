import { useMemo } from '@wordpress/element';
import { simpleHash } from '../helpers/simple-hash';

export function useBlockId( clientId ) {
	return useMemo( () => simpleHash( clientId ), [ clientId ] );
}
