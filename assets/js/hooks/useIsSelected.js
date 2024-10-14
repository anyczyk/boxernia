import { useSelect } from '@wordpress/data';
import { useBlockEditContext } from '@wordpress/block-editor';

export function useIsSelected( blockClientId ) {
	const { clientId } = useBlockEditContext();
	const finalClientId = blockClientId ?? clientId;

	return useSelect( ( select ) => {
		const {
			isBlockSelected,
		} = select( 'core/block-editor' );

		return isBlockSelected( finalClientId );
	}, [ finalClientId ] );
}
