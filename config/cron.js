module.exports.cron = {
  checkSubscriptionExpires: {
    schedule: "0 0 0 * * *",
    onTick: async () => {
      var usersToUpdate = [];
      const currentDate = Math.round(new Date().getTime() / 1000);
      const data = await user.find({
        subscriptionDateEnd: { "<=": currentDate },
      });
      if (!data.length) return;

      data.forEach(({ id }) => {
        usersToUpdate.push(
          user.update(id).set({ subscriptionDateEnd: null, typeMember: "free" })
        );
      });

      await Promise.all(usersToUpdate);
    },
  },
};
