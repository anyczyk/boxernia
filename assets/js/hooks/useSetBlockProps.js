import { useEffect } from '@wordpress/element';
import { isEmpty } from 'lodash';
import { getBlockType } from '@wordpress/blocks';
import { useBlockAttributes } from './useBlockAttributes';
import { useBlockEditContext } from '@wordpress/block-editor';
import { applyFilters } from '@wordpress/hooks';

const BLOCK_PROPS_KEY = 'blockProps';

export function useSetBlockProps( props = {} ) {
	const { attributes, setAttributes } = useBlockAttributes();
	const { name } = useBlockEditContext();

	const attributesValues = Object.entries( attributes )
		.filter( ( item ) => item[ 0 ] !== BLOCK_PROPS_KEY )
		.sort( ( a, b ) => a[ 0 ].localeCompare( b[ 0 ] ) )
		.map( ( item ) => item[ 1 ] );

	useEffect( () => {
		const blockProps = applyFilters(
			'blocks.getSaveContent.extraProps',
			{ ...props },
			getBlockType( name ),
			attributes
		);

		clearEmpties( blockProps );

		setAttributes( {
			blockProps,
		} );
	}, [ JSON.stringify( attributesValues ) ] );
}

function clearEmpties( o ) {
	for ( const k in o ) {
		if ( isEmpty( o[ k ] ) ) {
			delete o[ k ];
		}
	}
}
