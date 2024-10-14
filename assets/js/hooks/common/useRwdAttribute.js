import { rwdAttribute } from '../../utils/rwdAttribute';
import { useMemo } from '@wordpress/element';

export function useRwdAttribute( attribute ) {
	return useMemo( () => rwdAttribute( attribute ), [ attribute ] );
}
