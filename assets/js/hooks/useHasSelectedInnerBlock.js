import { useSelect } from '@wordpress/data';
import { useBlockEditContext } from '@wordpress/block-editor';

export function useHasSelectedInnerBlock( blockClientId ) {
	const { clientId } = useBlockEditContext();
	const finalClientId = blockClientId ?? clientId;

	return useSelect( ( select ) => {
		const {
			hasSelectedInnerBlock,
		} = select( 'core/block-editor' );

		return hasSelectedInnerBlock( finalClientId, true );
	}, [ finalClientId ] );
}
