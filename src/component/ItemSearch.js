function ItemSearch ({ searchValue, onSearch }) {
    return (
        <div>
            <input type="text" value={searchValue}
                placeholder="Search by name" style={{borderRadius:"8px",border:"none"}}
                onChange={(e) => onSearch(e.target.value)} />

        </div>

    );
}
export default ItemSearch;