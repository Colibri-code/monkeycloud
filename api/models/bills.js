module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idBill',
            columnType: 'int',
            unique: true,
            required: false,
            autoIncrement: true
        },        
        name: {
            type: 'string',
            columnName: 'name',
            columnType: 'varchar(20)',
            required: true
        },
        lastName: {
            type: 'string',
            columnName: 'lastName',
            columnType: 'varchar(20)',
            required: true            
        },
        country: {
            type: 'string',
            columnName: 'country',
            columnType: 'varchar(50)',
            required: true          
        },
        companyName: {
            type: 'string',
            columnName: 'companyName',
            columnType: 'varchar(30)',
            required: false,            
        },
        address: {
            type: 'string',
            columnName: 'address',
            columnType: 'varchar(50)',
            required: true            
        },
        townCity: {
            type: 'string',
            columnName: 'townCity',
            columnType: 'varchar(20)',
            required: true
        },
        state: {
            type: 'string',
            columnName: 'state',
            columnType: 'varchar(20)',
            required: true            
        },
        zip: {
            type: 'string',
            columnName: 'zip',
            columnType: 'varchar(10)',
            required: true        
        },
        emailAddress: {
            type: 'string',
            columnName: 'emailAddress',
            columnType: 'varchar(50)',
            required: true        
        },
        phone: {
            type: 'string',
            columnName: 'phone',
            columnType: 'varchar(20)',
            required: true        
        },
        orderNotes: { 
            type: 'string',
            columnName: 'orderNotes',
            columnType: 'varchar(100)',
            required: false            
        }
    }
}