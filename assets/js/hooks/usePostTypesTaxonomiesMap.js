import { useMemo } from '@wordpress/element';

export function usePostTypesTaxonomiesMap( postTypes ) {
	return useMemo( () => {
		if ( ! postTypes?.length ) {
			return;
		}
		return postTypes.reduce( ( accumulator, type ) => {
			accumulator[ type.slug ] = type.taxonomies;
			return accumulator;
		}, {} );
	}, [ postTypes ] );
}
