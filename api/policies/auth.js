const jwt = require('jsonwebtoken');
const secretKey =  'THIS_IS_SECRET'

module.exports = async (req, res, next) => {
  try {
    const token = req.header('Authorization');
    const decoded = jwt.verify(token, secretKey);
    const user = await User.findOne(decoded.id);
    req.user = user;
    return next();
  } catch (error) {
    res.forbidden();
  }
};
